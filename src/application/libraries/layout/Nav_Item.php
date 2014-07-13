<?php

class Nav_Item
{

    protected $_label;
    protected $_url;
    protected $_id;
    protected $_condition = true;
    protected $_selected = false;

    /** @var static */
    protected $_children = array();

    function __construct($id, $label, $url, $condition = true, $children = array())
    {
        $this->set_id($id)
                ->set_label($label)
                ->set_url($url)
                ->set_condition($condition)
                ->set_children($children);
    }

    function set_selected($bool)
    {
        $this->_selected = $bool;
        return $this;
    }

    function is_selected()
    {
        return $this->_selected;
    }

    /** @param $label string|callable */
    function set_label($label)
    {
        $this->_label = $label;
        return $this;
    }

    function get_label()
    {
        if (is_callable($this->_label))
        {
            return call_user_func($this->_label);
        }
        else
        {
            return (string) $this->_label;
        }
    }

    /** @var $cond string|callable */
    function set_condition($cond)
    {
        $this->_condition = $cond;
        return $this;
    }

    function is_display()
    {
        if (is_callable($this->_condition))
        {
            return call_user_func($this->_condition);
        }
        else
        {
            return (string) $this->_condition;
        }
    }

    /** @param $url string|callable */
    function set_url($url)
    {
        $this->_url = $url;
        return $this;
    }

    function get_url()
    {
        if (is_callable($this->_url))
        {
            return call_user_func($this->_url);
        }
        else
        {
            return (string) $this->_url;
        }
    }

    function set_id($id)
    {
        $this->_id = $id;
        return $this;
    }

    function get_id()
    {
        return $this->_id;
    }

    /** @var $nav Nav_Item|'divider' */
    function add_child($nav)
    {
        if ($nav instanceof static)
        {
            $this->_children[$nav->get_id()] = $nav;
        }
        else
        {
            $this->_children[] = $nav;
        }
        return $this;
    }

    function set_children($arr)
    {
        foreach ($arr as $nav)
        {
            $this->add_child($nav);
        }
        return $this;
    }

    /** @return static */
    function children($id = null)
    {
        return ($id ? $this->_children : $this->_children[$id]);
    }

    function __toString()
    {
        ob_start();
        $active = $this->is_selected() ? 'active' : '';
        ?>
        <?php if (empty($this->_children)): ?>
            <li class="<?php echo $active ?>">
                <a href="<?php echo $this->get_url() ?>"><?php echo $this->get_label() ?></a>
            </li>
        <?php else: ?>
            <li class="dropdown <?php echo $active ?>">
                <a href="<?php echo $this->get_url() ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->get_label() ?> <span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="themes">
                    <?php
                    foreach ($this->_children as $nav)
                    {
                        echo $nav == 'divider' ? '<li class="divider"></li>' : $nav;
                    }
                    ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php
        return ob_get_clean();
    }

}
