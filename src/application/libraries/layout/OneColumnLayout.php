<?php

include_once APPPATH . 'libraries/multiLanguage/multiLanguage.inc';

/**
 * Create tow columns layout.
 * 
 * @author ANLT
 * @author
 *
 */
class OneColumnLayout extends AbstractLayout
{

    protected $_activeCates = array();

    /*
     * (non-PHPdoc) @see AbstractLayout::render()
     */

    public function render($view)
    {
        $data = $this->_autoLoadLanguage ?
                MultilLanguageManager::getInstance()->attachedLanguageDataToScreen($view, $this->_data) :
                MultilLanguageManager::getInstance()->attachedLanguageDataToScreen('layout', $this->_data);
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
        $this->_layout = 'layout/one_colmun';
    }

    protected function attachedView($view, $data = array())
    {
        $data = parent::attachedView($view, $data);
        $data['view']->activeCates = $this->_activeCates;
        return $data;
    }

    function setActiveCates($first = null, $second = null, $third = null)
    {
        $this->_activeCates = array($first, $second, $third);
        return $this;
    }

}
