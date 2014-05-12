<?php

include_once APPPATH . 'libraries/multiLanguage/multiLanguage.inc';

/**
 * Create tow columns layout.
 * @author ANLT
 */
class SellerLayout extends AbstractLayout
{
    /*
     * (non-PHPdoc) @see AbstractLayout::render()
     */

    public function render($view)
    {
        $data = $this->_autoLoadLanguage ?
                MultilLanguageManager::getInstance()->attachedLanguageDataToScreen($view, $this->_data) :
                MultilLanguageManager::getInstance()->attachedLanguageDataToScreen('layout', $this->_data);
        $data = $this->attachedView($view, $data);
        $this->_CI->load->view($this->_layout, $data);
        return $this;
    }

    /*
     * (non-PHPdoc) @see AbstractLayout::__construct()
     */

    public function __construct()
    {
        parent::__construct();
        $this->setCss(array('/plugins/DataTables-1.10.0/media/css/jquery.dataTables.min.css'));
        $this->_layout = 'layout/seller';
    }

}
