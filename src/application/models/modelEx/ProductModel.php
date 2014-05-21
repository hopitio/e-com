<?php

defined('BASEPATH') or die('no direct script access allowed');

class ProductModel extends BaseModel
{

    /** @return ProductFixedMapper */
    function getAllNewProduct()
    {
        $limit = get_instance()->config->item('limit_hot');
        $query = Query::make()->select('date_created, COUNT(*)', true)
                ->from('t_product')
                ->groupBy('date_created')
                ->orderBy('date_created DESC')
                ->limit(50);
        $countDate = DB::getInstance()->GetAssoc($query);
        $total = 0;
        foreach ($countDate as $date => $count)
        {
            $total += $count;
            if ($total >= $limit)
            {
                break;
            }
        }
        $mapper = ProductFixedMapper::make()
                ->select('p.*', true)
                ->selectCountView()
                ->autoloadAttributes()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->filterDateRange($date, null);
        $mapper->getQuery()
                ->select('seller.name AS seller_name')
                ->innerJoin('t_seller seller', 'seller.id = p.fk_seller');
        return $mapper->findAll(function($record, ProductFixedDomain $domain)
                {
                    $domain->seller_name = $record['seller_name'];
                });
    }

    function updateCountView($userID, $productID)
    {
        $app = get_instance();
        $db = DB::getInstance();
        $userID = (int) $userID;
        $sessionKey = __METHOD__ . $productID . date_create(DB::getDate())->format('d-m-Y');

        if ($app->session->userdata($sessionKey))
        {
            //chỉ cập nhật 1 lần trong ngày
            return;
        }

        $db->StartTrans();
        $recordID = $db->GetOne("SELECT id FROM t_product_view WHERE fk_user=? AND fk_product=?", array($userID, $productID));
        if (!$recordID)
        {
            DB::insert('t_product_view', array(
                'fk_product' => $productID,
                'fk_user'    => $userID,
                'count_view' => 1
            ));
        }
        else
        {
            $db->Execute("UPDATE t_product_view SET count_view = count_view + 1 WHERE fk_user=? AND fk_product=?", array($userID, $productID));
        }

        if ($db->CompleteTrans())
        {
            $app->session->set_userdata($sessionKey, true);
        }
    }

    function updateProduct($data)
    {
        DB::getInstance()->StartTrans();
        if ($data['id'])
        {
            DB::update('t_product', array(
                'fk_category' => (int) $data['categoryID'],
                'status'      => $data['status']
                    ), 'id=' . intval($data['id'])
            );
        }
        else
        {
            $data['id'] = DB::insert('t_product', array(
                        'fk_seller'    => $data['seller'],
                        'fk_category'  => (int) $data['categoryID'],
                        'date_created' => DB::getDate(),
                        'status'       => (int) $data['status']
            ));
        }
        foreach ($data['attr'] as $attrType => $attrVal):
            $attrType = ProductAttributeTypeMapper::make()->filterCode($attrType)->find();
            if (!is_array($attrVal) && !$attrType->isRepeatingGroup())
            {
                $this->updateAttribute($data['id'], $data['language'], $attrType, $attrVal);
            }
            elseif (is_array($attrVal) && $attrType->isRepeatingGroup())
            {
                foreach ($attrVal as $attrValRepeating)
                {
                    $this->updateAttribute($data['id'], $data['language'], $attrType, $attrVal);
                }
            }
            else
            {
                throw new Lynx_BusinessLogicException("attr_type là {$attrType->codename} trong khi attrVal là " . gettype($attrVal));
            }
        endforeach;
        $this->updateProductImages($data['id']);
        DB::getInstance()->CompleteTrans();
        return $data['id'];
    }

    function updateProductImages($productID)
    {
        $fileIDs = isset($_POST['hdnImage']) ? $_POST['hdnImage'] : array();
        $imgTypes = array('thumbnail' => false, 'baseImage' => true, 'smallImage' => true, 'mainImage' => false); //true = array, false = single
        $map = array(
            'thumbnail'  => 'thumbnail',
            'baseImage'  => 'base_image',
            'smallImage' => 'small_image',
            'mainImage'  => 'main_image'
        );
        foreach ($fileIDs as $fileID)
        {
            $updateData = array();
            foreach ($imgTypes as $imgType => $multiple)
            {
                $field = $map[$imgType];
                $updateData['sort'] = isset($_POST['txtSort']) && isset($_POST['txtSort'][$fileID]) ? (int) $_POST['txtSort'][$fileID] : 0;
                if ($multiple)
                {
                    $updateData[$field] = isset($_POST['chkType']) ? 1 : 0;
                }
                else
                {
                    $updateData[$field] = isset($_POST['radType']) && isset($_POST['radType'][$imgType]) && $_POST['radType'][$imgType] == $fileID ? 1 : 0;
                }
            }
            DB::update('t_product_image', $updateData, 'fk_product=? AND fk_file=?', array($productID, $fileID));
        }
    }

    function addProductImage($productID, $fileID)
    {
        return DB::insert('t_product_image', array(
                    'fk_product' => $productID,
                    'fk_file'    => $fileID
        ));
    }

    function updateAttribute($productID, $language, ProductAttributeTypeDomain $attrType, $value)
    {
        $valueFields = array(
            'enum'    => 'value_enum',
            'file'    => 'value_number',
            'number'  => 'value_number',
            'text'    => 'value_text',
            'varchar' => 'value_varchar'
        );
        if (!isset($valueFields[$attrType->dataType]))
        {
            throw new Lynx_BusinessLogicException("Datatype: '{$attrType->dataType}' không được khai báo trong hàms");
        }
        if (!$attrType->id)
        {
            throw new Lynx_BusinessLogicException("Không tồn tại attribute type '$attrType'");
        }
        $pattrMapper = ProductAttributeMapper::make()->select('pa.id')->filterProduct($productID)
                        ->setLanguage($language)->filterAttributeType($attrType->id);
        if ($attrType->isRepeatingGroup())
        {
            $pattrMapper->where($valueFields[$attrType->dataType] . '=?')->addParam($value);
        }
        $pattr = $pattrMapper->find();
        /* @var $pattr ProductAttributeTypeDomain */
        $rid = 0;
        if ($productID)
        {
            $rid = $pattr->id;
        }
        if ($rid && $attrType->isRepeatingGroup() == false)
        {
            $updateRule = 'fk_product=? AND fk_attribute_type=? ';
            $updateParams = array($productID, $attrType->id);
            if ($attrType->multiLanguage)
            {
                $updateRule .= " AND `language`=?";
                $updateParams[] = $language;
            }
            DB::update('t_product_attribute', array($valueFields[$attrType->dataType] => $value), $updateRule, $updateParams);
        }
        elseif (!$rid)
        {
            $insertData = array(
                'fk_product'                      => $productID,
                'fk_attribute_type'               => $attrType->id,
                $valueFields[$attrType->dataType] => $value
            );
            if ($attrType->multiLanguage)
            {
                $insertData['language'] = $language;
            }
            DB::insert('t_product_attribute', $insertData);
        }
    }

    function addTax($productID, $taxID)
    {
        $rowExists = DB::getInstance()->GetOne("SELECT id FROM t_product_tax WHERE fk_product=? AND fk_tax=?", array($productID, $taxID));
        if (!$rowExists)
        {
            DB::insert('t_product_tax', array('fk_product' => $productID, 'fk_tax' => $taxID));
        }
    }

    function deleteTax($productID, $taxID)
    {
        DB::delete('t_product_tax', 'fk_product=? AND fk_tax=?', array($productID, $taxID));
    }

}
