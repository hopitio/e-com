<?php
defined('BASEPATH') or die('no direct access alowed');
/* @var $product ProductFixedDomain */
?>
<div class="form-group">
    <label class="control-label col-xs-2" for="txt_name"><span class="red">* </span>Tên sản phẩm:<span class="help-block">Tối đa 250 kí tự.</span></label>
    <div class="controls col-xs-10">
        <input type="text" name="pattr[name]" id="txt_name" class="" data-rule-required="true" value="<?php echo $product->getName() ?>">
    </div>
</div><!--control-group-->
<div class="form-group">
    <label class="control-label col-xs-2" for="txt_storage_code">Mã kho:</label>
    <div class="controls col-xs-4">
        <input type="text" name="pattr[storage_code]" id="txt_storage_code" class="" value="<?php echo $product->getStorageCode() ?>">
    </div>
</div><!--control-group-->
<div class="form-group">
    <label class="control-label col-xs-2" for="txt_quantity"><span class="red">* </span>Số lượng bán:</label>
    <div class="controls col-xs-4">
        <input type="text" name="pattr[quantity]" id="txt_quantity" class="" data-rule-required="true" value="<?php echo $product->getQuantity() ?>">
    </div>
    <label class="control-label col-xs-2" for="txt_brand">Nhãn hiệu:</label>
    <div class="controls col-xs-4">
        <input type="text" name="pattr[brand]" id="txt_brand" class="" value="<?php echo $product->getBrand() ?>">
    </div>
</div><!--control-group-->
<div class="form-group">
    <label class="control-label col-xs-2" for="txt_weight"><span class="red">* </span>Khối lượng/Thể tích:</label>
    <div class="controls col-xs-4">
        <input type="text" name="pattr[weight]" id="txt_weight" class="" data-rule-required="true" value="<?php echo $product->getWeight() ?>">
    </div>
    <label class="control-label col-xs-2" for="selWeightUnit"><span class="red">* </span>Đơn vị đo:</label>
    <div class="controls col-xs-4">
        <?php
        $selected = false;
        if (is_object($product->getWeightUnit()))
        {
            $selected = $product->getWeightUnit()->getTrueValue()->id;
        }
        $selWeightUnit = new SelectEnumControl('selWeightUnit', 'pattr[weight_unit]', 'weight_unit', $selected);
        $selWeightUnit
                ->get_a('SelectControl')
                ->addOption('0', 'None', true)
                ->setAttribute('data-rule-required', '');
        echo $selWeightUnit;
        ?>
    </div>
</div><!--control-group-->
<!--dimension-->
<div class="form-group">
    <label class="col-xs-2 control-label"><span class="red">* </span>Kích cỡ(cm):</label>
    <div class="col-xs-10">
        <div class="row">
            <div class="col-sm-4">
                <input type="text" class="" name="pattr[dimension_width]" id="txtDimensionWidth" 
                       placeholder="chiều rộng" value="<?php echo $product->getDimensionWidth() ?>" data-rule-required="true">
            </div>
            <div class="col-sm-4">
                <input type="text" class="" name="pattr[dimension_height]" id="txtDimensionHeight" placeholder="chiều cao" 
                       value="<?php echo $product->getDimensionHeight() ?>" data-rule-required="true">
            </div>
            <div class="col-sm-4">
                <input type="text" class="" name="pattr[dimension_depth]" id="txtDimensionDepth" placeholder="chiều sâu"
                       value="<?php echo $product->getDimensionDepth() ?>" data-rule-required="true">
            </div>
        </div>            
    </div>
</div>
<?php
if ($product->id == 0)
{
    $file = new ControlGroupDecorator('Ảnh sản phẩm:', new FileInput('fileImage', 'fileImage[]', 'image/jpeg', true));
    $file->get_a('FileInput')->setAttribute('data-rule-required', true);
    echo $file;
}
if ($product->id)
{
    //description
    $txtDesc = new ControlGroupDecorator('Mô tả:', new ckEditorControl('txtDesc', 'pattr[description]', $product->getDescription()));
    $txtDesc->get_a('ckEditorControl')->setAttribute('rows', 5);
    echo $txtDesc;
    //note
    $txtNote = new ControlGroupDecorator('Ghi chú:', new TextareaControl('txtNote', 'pattr[note]', $product->getNote()));
    $txtNote->get_a('TextareaControl')->setAttribute('rows', 5);
    echo $txtNote;
}
?>
<script>
    $('#selCodeType').change(function() {
        if ($(this).val() == '0')
            $('#txtCode').attr('readonly', 'readonly').val('');
        else
            $('#txtCode').removeAttr('readonly');
    }).trigger('change');

    $('#selWeightUnit').change(function() {
        if ($(this).val() == '0')
            $('#txtWeight').attr('readonly', 'readonly').val('');
        else
            $('#txtWeight').removeAttr('readonly');
    }).trigger('change');
</script>

