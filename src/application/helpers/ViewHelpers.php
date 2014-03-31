<?php
defined('BASEPATH') or die('No direct script access allowed');

class ViewHelpers
{

    static protected $_instance;

    /**
     * 
     * @return static
     */
    static function getInstance()
    {
        if (!static::$_instance)
        {
            static::$_instance = new static;
        }
        return static::$_instance;
    }

    /**
     * 
     * @param array $assoc
     * @param callable $labelCallback
     * @param array $addtionalParams
     * @return html
     */
    function options($assoc, $labelCallback = false, $addtionalParams = array())
    {
        ob_start();
        foreach ($assoc as $k => $v)
        {
            ?>
            <option value="<?php echo $k ?>">
                <?php echo is_callable($labelCallback) ? call_user_func_array($labelCallback, array_merge(array($v), $addtionalParams)) : $v ?>
            </option>
            <?php
            echo "\n";
        }
        return ob_get_clean();
    }

}