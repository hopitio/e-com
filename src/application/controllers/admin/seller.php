<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class seller extends AdminControllerAbstract
{
    protected $authorization_required = TRUE;
    protected $css = array(); 
    protected $js = array();
    function showPage()
    {
        $this->js[] = '/js/controller/SellerController.js';
        $this->js[] = '/js/services/SellerServiceClient.js';
        $this->js[] = '/js/services/SellerServiceClient.js';
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)
        ->setData(array(),false)
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('admin/seller');
    }

    
    function add()
    {
        $queryString = $this->getQueryStringParams();
        $callback = $queryString['callback'];
        $postData = $this->input->post();
        
        $portalAccount = json_decode($postData['portal_account']);
        $name = $postData['name'];
        $phone = $postData['phone'];
        $email = $postData['email'];
        $website = $postData['website'];
        $sellerLever = $postData['seller_lever'];
        $files = isset($_FILES['logo']) && !empty($_FILES['logo']) ? $_FILES['logo'] : $postData['logo_url'];
        
        foreach ($files as $file)
        {
            move_uploaded_file($tmp_name,$path.$name);
        }
        
        $sellerModel = new SellerModel();
        $sellerId = $sellerModel->save(null,$portalAccount, $name, $phone, $email, $website, $sellerLever, $files);
        $callbackResult = $sellerId == null ? 'ERROR' : 'SUCCESS';
        redirect("{$callback}&action=ADD&action_callback={$callbackResult}");
    }
    
    function edit($sellerId)
    {
        $queryString = $this->getQueryStringParams();
        $callback = $queryString['callback'];
        $postData = $this->input->post();
        $portalAccount = json_decode($postData['portal_account']);
        $name = $postData['name'];
        $phone = $postData['phone'];
        $email = $postData['email'];
        $website = $postData['website'];
        $sellerLever = $postData['seller_lever'];
        $files = isset($_FILES['logo']) && !empty($_FILES['logo']) ? $_FILES['logo'] : $postData['logo_url'];
        
        $sellerModel = new SellerModel();
        $sellerId = $sellerModel->save($sellerId,$portalAccount, $name, $phone, $email, $website, $sellerLever, $files);
        $callbackResult = $sellerId == null ? 'ERROR' : 'SUCCESS';
        redirect("{$callback}&action=EDIT&action_callback={$callbackResult}");
    }
    
}