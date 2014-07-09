<?php

class sellerAPI extends BaseController{
    
    function searchSeller($pageSize,$pageNumber)
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