<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class apiInvoice extends BasePortalController
{
    protected $is_portal_controller = false;

    function getInvoice($invocieId){
        $serviceRepository = new PortalBizPaymentHistory();
        $invocie = $serviceRepository->getInvoiceInformation($invocieId);
        
        $orderResopsitory = new PortalModelOrder();
        $orderResopsitory->id = $invocie->fk_order;
        $order = $orderResopsitory->getOrderWithCurrentStatus();
        
        $invocie->order = $order[0];
        $this->output->set_content_type('application/json')->set_output(json_encode($invocie, true));
    }
}