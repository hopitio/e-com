<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class shippingFromUSA extends BasePortalController
{
    function showPage(){
        $data = array();
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($data, true)
        ->setCss(array())
        ->setJavascript(array('/plugins/validation/jquery.validate.min.js'))
        ->render('portalOrder/ShippingFromUSA');
    }
    
    function save(){
        $url = $this->input->post("url");
        $name =  $this->input->post("full-name");
        $phone =  $this->input->post("phone");
        $email =  $this->input->post("email");
        
        $data = array();
        $data['url'] = $url;
        $data['full_name'] = $name;
        $data['email'] = $phone;
        $data['phone'] = $email;
        $config = $this->config->item('ShippingFromUSA');
        MailManager::initalAndSend(MailManager::SHIPPING_FROM_USA, $config['SEND_TO'], $data);
        redirect("/portal/shipping_from_usa/done");
    }       
    
    function done(){
        $data = array();
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($data, true)
        ->setCss(array())
        ->setJavascript(array('/plugins/validation/jquery.validate.min.js'))
        ->render('portalOrder/ShippingFromUSADone');
    }
}