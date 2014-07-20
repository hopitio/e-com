
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class product extends AdminControllerAbstract
{

    protected $authorization_required = TRUE;
    protected $css = array();
    protected $js = array();

    function main()
    {
        $data['categories'] = CategoryMapper::qry_all_child_categories();
        $data['sellers'] = SellerMapper::make()->findAll();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)
                ->setData($data, false)
                ->setCss($this->css)
                ->setJavascript($this->js)
                ->render('admin/product');
    }

    function svc_all_products()
    {
        $mapper = ProductFixedMapper::make()
                ->setLanguage('VN-VI')
                ->autoloadAttributes()
                ->autoloadTaxes();
        $mapper->getQuery()
                ->select('seller.name AS seller_name, cl.name AS category_name')
                ->innerJoin('t_seller seller', 'seller.id = p.fk_seller')
                ->innerJoin('t_category_language cl', "cl.fk_category=p.fk_category AND cl.language='VN-VI'");
        $products = $mapper->findAll(function($record, ProductFixedDomain $instance)
        {
            /* @var $instance ProductFixedDomain */
            $instance->seller_name = $record['seller_name'];
            $instance->name = (string) $instance->getName();
            $instance->category = $record['category_name'];
            $instance->code = (string) $instance->getStorageCode();
            $instance->price = (string) $instance->getFinalPriceMoney('VND');
            $instance->qty = (string) $instance->getQuantity();
            $instance->status = $instance->status == 1 ? 'Đang bán' : $instance->status == '0' ? 'Không bán' : 'Đã xóa';
        });
        $count = $mapper->count();
        header('content-type:application/json');
        echo json_encode(array(
            'data'        => $products,
            'totalRecord' => $count
        ));
    }

}
