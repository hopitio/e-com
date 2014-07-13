<?php

class userAPI extends AdminControllerAbstract{
    
    function getGiftUserId($userId)
    {
        $userModel = new UserModel();
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $userModel->getUserbyId($userId);
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    

}