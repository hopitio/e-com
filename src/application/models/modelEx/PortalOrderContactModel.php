<?php
/**
 * Cung cấp hàm tương tác với order và contact t_order_contact
 * @author ANLT
 *
 */
class PortalOrderContactModel extends PortalBaseModel
{
    protected $_constIntanceName = 'T_order_contact';
    var $id,$fk_order,$fk_user_contact,$contact_status;
    
    function bachInsertContact($contacts)
    {
        foreach ($contacts  as &$contact)
        {
            $contact->id = (new PortalCommonModel())->getUUID();
        }
       return parent::bacthInsert($contacts);
    }
}