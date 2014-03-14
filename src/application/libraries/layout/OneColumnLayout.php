<?php
include_once APPPATH.'libraries/multiLanguage/multiLanguage.inc';
/**
 * Create tow columns layout.
 * @author ANLT
 * @author
 */
class OneColumnLayout extends AbstractLayout
{
    
    /*
     * (non-PHPdoc) @see AbstractLayout::render()
     */
    public function render($name, $viewData = array())
    {
        $dataHeader = MultilLanguageManager::getInstance()->acctachedLanguageDataToScreen($name);
        $this->_CI->load->view('layout/header',$dataHeader);
        $this->_CI->load->view('layout/one_colmun');
        $this->_CI->load->view('layout/footer');
        
    }
    
    /*
     * (non-PHPdoc) @see AbstractLayout::__construct()
     */
    public function __construct()
    {
        parent::__construct();
        $this->_layout = 'layout/one_colmun';
    }
    
    
}