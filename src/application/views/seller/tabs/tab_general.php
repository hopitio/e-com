<?php
defined('BASEPATH') or die('no direct access alowed');
/* @var $product ProductFixedDomain */

//name
$txtName = new ControlGroupDecorator('Tên sản phẩm<span class="help-block">Tối đa 250 kí tự.</span>', new TextboxInput('txtName', 'pattr[name]', strval($product->getName())));
$txtName->get_a('TextboxInput')
        ->setAttribute('data-rule-required', true)
        ->setAttribute('data-rule-maxlength', 250);
echo $txtName;
//stock
$txtStockQty = new ControlGroupDecorator('Số lượng bán:', new TextboxInput('txtStockQty', 'pattr[quantity]', (string) $product->getQuantity()));
$txtStockQty->get_a('TextboxInput')->setAttribute('data-rule-required', true)->setAttribute('data-rule-number', true);
$txtStockQty->get_a('TextboxInput')->addClass('input-size-medium');
echo $txtStockQty;
//brand
$txtBrand = new ControlGroupDecorator('Nhãn hiệu', new TextboxInput('txtBrand', 'pattr[brand]', strval($product->getBrand())));
$txtBrand->get_a('TextboxInput')->addClass('input-size-medium');
echo $txtBrand;
//storage code type
$selected = false;
if (is_object($product->getStorageCodeType()))
{
    $selected = $product->getStorageCodeType()->getTrueValue()->id;
}

$selCodeType = new ControlGroupDecorator('Loại mã kho:', new SelectEnumControl('selCodeType', 'pattr[storage_code_type]', 'storage_code_type', $selected));
$selCodeType->get_a('SelectControl')->addOption('0', 'None', true)->addClass('input-size-medium');
echo $selCodeType;
//code
$txtCode = new ControlGroupDecorator('Mã kho:', new TextboxInput('txtCode', 'pattr[storage_code]', (string) $product->getStorageCode()));
$txtCode->get_a('TextboxInput')->addClass('input-size-medium');
echo $txtCode;

//weight
$selected = false;
if (is_object($product->getWeightUnit()))
{
    $selected = $product->getWeightUnit()->getTrueValue()->id;
}
if ($product->id)
{
    $selWeightUnit = new ControlGroupDecorator('Đơn vị đo:', new SelectEnumControl('selWeightUnit', 'pattr[weight_unit]', 'weight_unit', $selected));
    $selWeightUnit->get_a('SelectControl')->addOption('0', 'None', true)->addClass('input-size-medium');
    echo $selWeightUnit;

    $txtWeight = new ControlGroupDecorator('Nặng:', new TextboxInput('txtWeight', 'pattr[weight]', (string) $product->getWeight()));
    $txtWeight->get_a('TextboxInput')->addClass('input-size-medium');
    echo $txtWeight;
}

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
    $txtDesc->get_a('ckEditorControl')->setAttribute('rows', 10);
    echo $txtDesc;
//note
    $txtNote = new ControlGroupDecorator('Ghi chú:', new ckEditorControl('txtNote', 'pattr[note]', $product->getNote()));
    $txtNote->get_a('ckEditorControl')->setAttribute('rows', 10);
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

