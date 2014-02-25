<?php
defined('DS') or die;
/* @var $ou \ou_Domain */
echo $this->hidden('hdn_ou_id', $ou->id);
?>
<div class="form-group">
    <label class="control-label col-sm-3" for="sel_parent">Trực thuộc <span class="required">*</span></label>
    <div class="col-sm-9 control-group">
        <select name="sel_parent" id="sel_parent" class="form-control" required>
            <option></option>
            <?php foreach ($arr_all_ou as $arr_single_ou): ?>
                <?php
                $item = new ou_Domain();
                $item->import_array($arr_single_ou);
                $v_level = substr_count($item->internal_order, '/') - 1;
                ?>
                <option value="<?php echo $item->id ?>"><?php echo str_repeat('-- ', $v_level) . $item->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3" for="txt_name">Tên đơn vị <span class="required">*</span></label>
    <div class="col-sm-9 control-group">
        <input type="text" class="form-control" name="txt_name" id="txt_name" value="<?php echo $ou->name ?>"/>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3" for="txt_code_name">Mã đơn vị <span class="required">*</span></label>
    <div class="col-sm-9 control-group">
        <input type="text" class="form-control" name="txt_code_name" id="txt_code_name" value="<?php echo $ou->code_name ?>"/>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3" for="txt_order">Thứ tự</label>
    <div class="col-sm-2">
        <input type="number" class="form-control" name="txt_order" id="txt_order" value="<?php echo $ou->order ?>"/>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3" for="chk_status"></label>
    <div class="col-sm-9 control-group">
        <label>
            <input type="checkbox" name="chk_status" id="chk_status" value="1"/>
            Hoạt động
        </label>
    </div>
</div>

