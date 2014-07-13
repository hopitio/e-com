<?php

include_once APPPATH . 'libraries/multiLanguage/multiLanguage.inc';
require_once __DIR__ . '/Nav_Item.php';

/**
 * Create tow columns layout.
 * @author ANLT
 */
class SellerLayout extends AbstractLayout
{

    protected $_title = 'Sfriendly';
    protected $_heading;
    protected $_sidebar;
    protected $_mainNavs = array();

    function setTitle($title)
    {
        $this->_title = $title;
        return $this;
    }

    function addMainNav(Nav_Item $nav)
    {
        $this->_mainNavs[$nav->get_id()] = $nav;
        return $this;
    }

    function setSelectedNav($mainNavID, $subNavID = null)
    {
        if (isset($this->_mainNavs[$mainNavID]))
        {
            $this->_mainNavs[$mainNavID]->set_selected(true);
        }
        if ($subNavID && $this->_mainNavs[$mainNavID]->children($subNavID))
        {
            $this->_mainNavs[$mainNavID]->children($subNavID)->set_selected(true);
        }
        return $this;
    }

    function setSidebar($sidebarName)
    {
        $this->_sidebar = $sidebarName;
        return $this;
    }

    function setHeading($heading)
    {
        $this->_heading = $heading;
        return $this;
    }

    protected function attachedView($view, $data = array())
    {
        $data = parent::attachedView($view, $data);
        $view = &$data['view'];
        $view->title = $this->_title;
        $view->heading = $this->_heading;
        $view->sidebar = $this->_sidebar;
        $view->mainNavs = $this->_mainNavs;
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
        $this->setCss(array(
            '/cerulean/css/bootstrap.min.css',
            '/cerulean/assets/css/bootswatch.min.css',
            '/cerulean/css/font-awesome.min.css',
            '/cerulean/plugins/gritter/css/jquery.gritter.css',
            '/plugins/DataTables-1.10.0/media/css/jquery.dataTables.min.css',
            '/cerulean/css/custom.css'
        ))->setJavascript(array(
            "/cerulean/bower_components/bootstrap/dist/js/bootstrap.min.js",
            "/cerulean/assets/js/bootswatch.js",
            '/cerulean/plugins/DataTables-1.10.0/js/jquery.dataTables.min.js',
            '/cerulean/plugins/gritter/js/jquery.gritter.min.js',
            '/cerulean/plugins/validation/jquery.validate.min.js',
            '/cerulean/plugins/validation/additional-methods.min.js',
            '/cerulean/plugins/context_menu/bootstrap-contextmenu.js',
            "/cerulean/js/app.js"
        ));
        $this->_layout = 'layout/seller2';
    }

}
