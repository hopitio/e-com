<?php

defined('BASEPATH') or die('no direct script access allowed');

class PinModel extends BaseModel
{

    /**
     * 
     * @return PinDomain
     */
    function getAllPin()
    {
        return PinMapper::make()
                        ->autoloadAttributes(true, User::getCurrentUser()->languageKey)
                        ->setUser(User::getCurrentUser()->id)
                        ->select('p.*')
                        ->findAll();
    }

    /**
     * 
     * @param type $userID
     * @param type $productID
     * @throws Lynx_BusinessLogicException
     */
    function pin($userID, $productID)
    {
        if (!$userID || !$productID)
        {
            throw new Lynx_BusinessLogicException("");
        }
        DB::insert('t_pin', array(
            'fk_user' => $userID,
            'fk_product' => $productID
        ));
        if ($erroNo = DB::getInstance()->ErrorNo())
        {
            if ($erroNo == 1062) //duplicate unique key
            {
                throw new Lynx_BusinessLogicException("Sản phẩm này đã tồn tại!");
            }
            else
            {
                throw new Lynx_BusinessLogicException("Insert thất bại do lỗi khác");
            }
        }
    }

    function unpin($productID)
    {
        DB::delete('t_pin', 'fk_user=? AND fk_product=?', array(User::getCurrentUser()->id, $productID));
    }

}
