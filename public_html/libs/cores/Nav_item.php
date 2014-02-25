<?php

defined('DS') or die;

class Nav_item
{

    protected $_id;
    protected $_label;
    protected $_show = true;
    protected $_url = 'javascript:;';
    protected $_children = array();

    public function __construct($id, $label, $url = 'javascript:;', $show = true, $children = array())
    {
        $this->_id = $id;
        if ($label)
        {
            $this->_label = is_callable($label) ? call_user_func($label) : $label;
        }
        if ($url)
        {
            $this->_url = is_callable($url) ? call_user_func($url) : $url;
        }
        if ($show)
        {
            $this->_show = is_callable($show) ? call_user_func($show) : $show;
        }
        $this->_children = $children;
    }

    public function get_id()
    {
        return $this->_id;
    }

    public function get_label()
    {
        return $this->_label;
    }

    public function get_url()
    {
        return $this->_url;
    }

    /** @return \Nav_item[] */
    public function get_children()
    {
        return $this->_children;
    }

    public function is_show()
    {
        return $this->_show;
    }

}
