<?php
defined('BASEPATH') or die('no direct script access allowed');

class ControlGroupDecorator extends HTMLDecoratorAbstract
{

    protected $_labelFor;

    function __construct($labelFor = null, HTMLAbstract $object = null)
    {
        parent::__construct($object);
        $this->_labelFor = $labelFor;
    }

    function draw()
    {
        ob_start();
        $input = $this->get_a('ControlAbstract');
        $inputID = null;
        if ($input)
        {
            $inputID = $input->attributes('id');
            if ($input->attributes('data-rule-required'))
            {
                $hasDot = strrpos($this->_labelFor, ':');
                if ($hasDot !== false)
                {
                    $this->_labelFor = substr($this->_labelFor, 0, $hasDot) . "<span class='red'> *:</span>" . '';
                }
                else
                {
                    $this->_labelFor .= "<span class='red'> *</span>";
                }
            }
        }
        ?>
        <div class="form-group control-group">
            <label for="<?php echo $inputID ?>" class="col-sm-3 control-label"><?php echo $this->_labelFor ?></label>
            <div class="col-sm-9 controls">
                <?php echo $this->_object ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

}
