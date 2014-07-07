<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class sellerFind extends AdminControllerAbstract
{
    protected $authorization_required = TRUE;
    protected $css = array(); 
    protected $js = array();
    function showPage()
    {
        $this->js[] = '/js/controller/SellerFindController.js';
        $this->js[] = '/js/services/SellerFindServiceClient.js';
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('admin/sellerFind');
    }
    
    function getSellerListXhr($pageSize,$pageNumber)
    {
        $resultSeller = array();
        $queryString = $this->getQueryStringParams();
        $sellerModel = new SellerModel();
        $countResult = $sellerModel->findSellerCount($queryString['UID'],$queryString['NAME']);
        $resultSeller['SELLER'] = $sellerModel->findSeller($queryString['UID'],$queryString['NAME'],$pageSize,$pageNumber);
        $resultSeller['COUNT'] = $countResult['total'];
         
        
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $resultSeller;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
   
}