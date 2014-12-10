<?php

include_once APPPATH . 'libraries/multiLanguage/multiLanguage.inc';

class StaticPageLayout extends AbstractLayout
{

    protected $_title = 'Sfriendly';
    protected $_heading;

    function setTitle($title)
    {
        $this->_title = $title;
        return $this;
    }

    protected function attachedView($view, $data = array())
    {
        $data = parent::attachedView($view, $data);
        $view = &$data['view'];
        $view->title = $this->_title;
        return $data;
    }

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
        $this->_layout = 'layout/static_page';
    }

}
