<?php
defined('DS') or die;

/* @var $this \cores_View */
?>
<?php if ($success): ?>
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo ucfirst(__('password_changed_title')) ?>!</strong> <?php echo ucfirst(__('password_changed_message')) ?>
    </div>
<?php else: ?>
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo ucfirst(__('password_error_title')) ?>!</strong>
        &nbsp;
        <?php echo ucfirst(__('password_error_message', array($this->get_controller_url() . 'dsp_change_password'))) ?>
    </div>
<?php endif; 



