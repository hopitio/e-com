<?php
include_once APPPATH . 'libraries/multiLanguage/multiLanguage.inc';

/**
 * Khởi tạo layout cho phần admin.
 * 
 * @author ANLT
 * @author
 *
 */
class PortalAdminLayout extends AbstractLayout
{
    
    /*
     * (non-PHPdoc) @see AbstractLayout::render()
     */
    public function render($view)
    {
        $data = $this->_autoLoadLanguage ? 
                MultilLanguageManager::getInstance()->attachedLanguageDataToScreen($view,$this->_data):
                MultilLanguageManager::getInstance()->attachedLanguageDataToScreen('layout',$this->_data);
        $data = $this->attachedView($view, $data);
        $data['user'] = User::getCurrentUser();
        $this->_CI->load->view($this->_layout, $data);
        return $this;
    }
    
    /*
     * (non-PHPdoc) @see AbstractLayout::__construct()
     */
    public function __construct()
    {
        parent::__construct();
        $this->_layout = 'layout/portal_admin_one_column';
    }
}