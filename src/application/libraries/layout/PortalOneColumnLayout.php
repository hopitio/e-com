<?php
include_once APPPATH.'libraries/multiLanguage/multiLanguage.inc';
/**
 * Create tow columns layout.
 * @author ANLT
 * @author
 */
class PortalOneColumnLayout extends AbstractLayout
{
    
    /*
     * (non-PHPdoc) @see AbstractLayout::render()
     */
    public function render($view)
    {
        if($this->_autoLoadLanguage){
           $data = MultilLanguageManager::getInstance()->attachedLanguageDataToScreen($view,$this->_data);
        }
        $data =  $this->attachedView($view,$data);
        $this->_CI->load->view($this->_layout,$data);
        return $this;
    }
    
    /*
     * (non-PHPdoc) @see AbstractLayout::__construct()
     */
    public function __construct()
    {
        parent::__construct();
        $this->_layout = 'layout/portal_one_column';
    }
    
    
}