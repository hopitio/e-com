<?php

class sellerAPI extends AdminControllerAbstract{
    
    function searchSeller()
    {
        $resultSeller = array();
        $queryString = $this->getQueryStringParams();
        $sellerModel = new SellerModel();
        $accountId = $queryString['account_id'];
        $sellerName = $queryString['shop_name'];
        $limit = $queryString['limit'];
        $offset = $queryString['offset'];

        $countResult = $sellerModel->findSellerCount($accountId,$sellerName,$limit,$offset);
        $resultSeller['SELLER'] = $sellerModel->findSeller($accountId,$sellerName,$limit,$offset);
        $resultSeller['COUNT'] = $countResult['total'];
        
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $resultSeller;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function uploadSellerImage(){
        $files = isset($_FILES['fileImage']) && !empty($_FILES['fileImage']) ? $_FILES['fileImage'] : array();
        $fileModel = new FileModel();
        try
        {
            if (isset($files['name']))
            {
                for ($i = 0; $i < count($files['name']); $i++)
                {
                    $fileInfo = array();
                        foreach ($files as $k => $fileData)
                        {
                        $fileInfo[$k] = $fileData[$i];
                        }
                            if (!$fileInfo['name'] || !is_uploaded_file($fileInfo['tmp_name']) || !file_exists($fileInfo['tmp_name']))
                            {
                                continue;
                    }
                    
                    list($imgWidth, $imgHeight, $imgType, $imgAttr) = getimagesize($fileInfo['tmp_name']);
                    
                    if($imgWidth > 200 || $imgHeight > 200){
                        $this->setResult(null, "Images size < 200px x 200px");
                    }
                    
                    $fileID = $fileModel->handleImageUpload($fileInfo);
                    
                    $this->setResult($fileID, null);
                }
            }else{
                $this->setResult(null, 'File name need set');
            }
        }catch (Exception $e){
            $this->setResult(null, $e->getMessage());
        }
    }
    
    private function setResult($data,$errorMsg = null){
        $async = new AsyncResult();
        $async->isError = $errorMsg != null;
        $async->errorMessage = $errorMsg;
        $async->data = $data;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function changeStatus($sellerId){
        $data = array();
        $queryString = $this->getQueryStringParams();
        $status = $queryString['status'];
        
        $data['status'] = $status;
        $data['status_date'] = DB::getDate();
        $result = DB::update('t_seller', $data , 't_seller.id = '.$sellerId);
        
        $this->setResult($result, null);
    }

}