<?php

defined('DS') or die;

class error_Controller extends Controller
{

    public function main()
    {
        header('HTTP/1.0 404 Not Found');
        $args = func_get_args();
        $this->view->set_layout(null)
                ->set_heading('Error 404')
                ->set_title('Error 404')
                ->render('main', array('message' => ''));
    }

}
