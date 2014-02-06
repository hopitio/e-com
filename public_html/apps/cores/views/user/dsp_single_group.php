<?php
defined('DS') or die;

/* @var $this \cores_View */
/* @var $group \group_Domain */
/* @var $current_ou \ou_Domain */
echo $this->hidden('hdn_group_id', $group->id);
?>
<div class="form-group">
    <label for="sel_ou" class="col-sm-3 control-label">Đơn vị <span class="required">*</span></label>
    <div class="col-sm-9 controls">
        <select name="sel_ou" id="sel_ou" class="form-control">
            <option></option>
            <?php foreach ($arr_all_ou as $arr_single_ou): ?>
                <?php
                $ou = new ou_Domain;
                $ou->import_array($arr_single_ou);
                $v_level = substr_count($ou->internal_order, '/') - 1;
                $v_selected = $current_ou->id == $ou->id ? 'selected' : '';
                ?>
                <option value="<?php echo $ou->id ?>" <?php echo $v_selected ?>>
                    <?php echo str_repeat('-- ', $v_level) . $ou->name ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="txt_name" class="col-sm-3 control-label">Tên nhóm <span class="required">*</span></label>
    <div class="col-sm-9 controls">
        <input type="text" class="form-control" name="txt_name" id="txt_name" value="<?php echo $group->name ?>" required/>
    </div>
</div>
<div class="form-group">
    <label for="txt_code_name" class="col-sm-3 control-label">Mã nhóm <span class="required">*</span></label>
    <div class="col-sm-9 controls">
        <input type="text" class="form-control" name="txt_code_name" id="txt_code_name" value="<?php echo $group->code_name ?>"/>
    </div>
</div>
<div class="form-group">
    <label for="txt_name" class="col-sm-3 control-label"></label>
    <div class="col-sm-9 controls">
        <label>
            <?php $v_checked = $group->status ? 'checked' : '' ?>
            <input type="checkbox" name="chk_status" id="chk_status" value="1" <?php echo $v_checked ?>/>
            Hoạt động
        </label>
    </div>
</div>

