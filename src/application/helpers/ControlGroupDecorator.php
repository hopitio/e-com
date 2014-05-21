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
        }
        ?>
        <div class="form-group">
            <label for="<?php echo $inputID ?>" class="col-sm-3 control-label"><?php echo $this->_labelFor ?></label>
            <div class="col-sm-9">
                <?php echo $this->_object ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

}
