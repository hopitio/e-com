<?php

defined('BASEPATH') or die('No direct script access allowed');

class AdvertisementModel extends BaseModel
{
    function loadBanner()
    {
        $query = Query::make()
                ->select('`key`,`value`',1)
        ->from('t_setting');
        $result = DB::getInstance()->GetAssoc($query);
        $banner = array();
        foreach ($result as $key => $value)
        {
            $banner[$key] = array();
            $xml = new SimpleXMLElement($result[$key]);
            $img = $xml->xpath('img');
            for ($i = 0; $i < count($img); $i++)
            {
                $img_arr = (array)($img[$i]);
                $banner[$key][$i] = $img_arr["@attributes"];
            }
        }
        return $banner;
    }
    
    /**
     * 
     * @param unknown $userId
     * @param unknown $shopName
     * @return Ambigous <multitype:, boolean>
     */
    function findSellerCount($userId,$shopName){
        $query = Query::make()
        ->select('count(t_seller.id) as total')
        ->from('t_seller')
        ->innerJoin('t_user', 't_seller.fk_manager = t_user.id')
        ->where("( CONCAT('', ? ,'') = '' OR t_user.portal_id = ? ) 
                    AND
                   ( ? = '' OR t_seller.name LIKE CONCAT('%', ? ,'%') )
                ");
        $queryInclude = array(
            $userId,
            $userId,
            $shopName,
            $shopName
        );
        $record = DB::getInstance()->getRow($query, $queryInclude);
        return $record;
    }
    
    
    function save($sellerId = null, $portalAccount, $name, $phone, $email, $website,
        $sellerLever, $files)
    {
        $id = null;
        $userId = $this->updateUser($portalAccount);
        $logo = '';
        $updateData = array();
        if(gettype($files) == 'array' && $files['size'] > 0){
            $logo = $this->saveLogo($files);
            $updateData['logo'] = $logo;
        }
        
        $updateData['name'] = $name;
        $updateData['phoneno'] = $phone;
        $updateData['email'] = $email;
        $updateData['website'] = $website;
        $updateData['status_date'] = DB::getDate();
        $updateData['status_reason'] = 'CREATED';
        $updateData['fk_manager'] = $userId;
        $updateData['sid'] = '';
        
        if($sellerId == null){
            $id = DB::insert('t_seller', $updateData);
        }else{
            $updateData['status_reason'] = 'UPDATED';
            $id = DB::update('t_seller', $updateData,  "t_seller.id = {$sellerId}" );
        }
        return $id;
    }
    
    function updateUser($portalAccount){
        
        $query = Query::make()->from('t_user')->where(" t_user.portal_id = ? ");
        $queryInclude = array(
            $portalAccount->id
        );
        $id = null;
        $record = DB::getInstance()->GetOne($query,$queryInclude);
        if(count($record) <= 0 ){
            $id = DB::insert('t_user', array(
                'portal_id' => $portalAccount->id,
                'platform_key' => $portalAccount->platform_key,
                'user_type' => DatabaseFixedValue::USER_TYPE_USER,
                'created_date' => DB::getDate(),
            ));
        }else{
            $id = $record;
        }
        return $id;
    }
    
    function saveLogo($files)
    {
        $fileModel = new FileModel();
        $fileID = null;
        try
        {
            if (isset($files['name']))
            {
                $fileInfo = $files;
                if (! $fileInfo['name'] ||
                     ! is_uploaded_file($fileInfo['tmp_name']) ||
                     ! file_exists($fileInfo['tmp_name']))
                {
                    //continue;
                }
                list ($imgWidth, $imgHeight, $imgType, $imgAttr) = getimagesize(
                    $fileInfo['tmp_name']);
                $fileID = $fileModel->handleImageUpload($fileInfo);
            }
        }
        catch (Exception $e)
        {
            throw $e;
        }
        
        return $fileID;
    }
}
