<?php
defined('DS') or die;
/* @var $this \cores_View */
?>
<form class="well form-horizontal form-validate" method="post" novalidate action="<?php echo $this->get_controller_url() ?>update_password">
    <div class="form-group">
        <label for="txt_current_password" class="col-sm-2 control-label">
            <?php echo ucfirst(__('current_password')) ?>
        </label>
        <div class="col-sm-10 controls">
            <input 
                type="password" id="txt_current_password" name="txt_current_password"
                required data-validation-required-message="<?php echo ucfirst(__('validate_required')) ?>"
                />
        </div>
    </div>
    <div class="form-group">
        <label for="txt_new_password" class="col-sm-2 control-label">
            <?php echo ucfirst(__('new_password')) ?>
        </label>
        <div class="col-sm-10 controls">
            <input 
                type="password" id="txt_new_password" name="txt_new_password" 
                required data-validation-required-message="<?php echo ucfirst(__('validate_required')) ?>"
                />
        </div>
    </div>
    <div class="form-group">
        <label for="txt_retype_password" class="col-sm-2 control-label">
            <?php echo ucfirst(__('retype_password')) ?>
        </label>
        <div class="col-sm-10 controls">
            <input 
                type="password" id="txt_retype_password" name="txt_retype_password"
                required data-validation-required-message="<?php echo ucfirst(__('validate_required')) ?>"
                data-validation-matches-match="txt_new_password" 
                data-validation-matches-message="<?php echo ucfirst(__('validate_match_password')) ?>" 
                />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary btn-sm"><?php echo ucfirst(__('submit')) ?></button>
        </div>
    </div>
</form>