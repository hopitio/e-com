<?php
defined('BASEPATH') or die('no direct access alowed');
/* @var $product ProductFixedDomain */

//name
$txtName = new WrapDecorator('div', 'col-xs-8 row', new TextboxInput('txtName', 'pattr[name]', strval($product->getName())));
$txtName = $txtName->decorate(new ControlGroupDecorator('Product Name:'));
echo $txtName;
//storage code type
$selected = false;
if (is_object($product->getStorageCodeType()))
{
    $selected = $product->getStorageCodeType()->getTrueValue()->id;
}

$selCodeType = new ControlGroupDecorator('Storage Code Type:', new SelectEnumControl('selCodeType', 'pattr[storage_code_type]', 'storage_code_type', $selected));
$selCodeType->get_a('SelectControl')->addOption('0', 'None', true)->addClass('input-size-medium');
echo $selCodeType;
//code
$txtCode = new ControlGroupDecorator('Code:', new TextboxInput('txtCode', 'pattr[storage_code]', (string) $product->getStorageCode()));
$txtCode->get_a('TextboxInput')->addClass('input-size-medium');
echo $txtCode;
//stock
$txtStockQty = new ControlGroupDecorator('Stock quantity:', new TextboxInput('txtStockQty', 'pattr[quantity]', (string) $product->getQuantity()));
$txtStockQty->get_a('TextboxInput')->addClass('input-size-medium');
echo $txtStockQty;
//weight
$selected = false;
if (is_object($product->getWeightUnit()))
{
    $selected = $product->getWeightUnit()->getTrueValue()->id;
}
$selWeightUnit = new ControlGroupDecorator('Weight unit:', new SelectEnumControl('selWeightUnit', 'pattr[weight_unit]', 'weight_unit', $selected));
$selWeightUnit->get_a('SelectControl')->addOption('0', 'None', true)->addClass('input-size-medium');
echo $selWeightUnit;

$txtWeight = new ControlGroupDecorator('Weight:', new TextboxInput('txtWeight', 'pattr[weight]', (string) $product->getWeight()));
$txtWeight->get_a('TextboxInput')->addClass('input-size-medium');
echo $txtWeight;
//status
$chkStatus = new LabelDecorator('Active', new CheckboxInput('chkStatus', 'chkStatus', $product->status == 1 || !$product->id));
echo $chkStatus->decorate(new ControlGroupDecorator());
//description
$txtDesc = new ControlGroupDecorator('Description:', new ckEditorControl('txtDesc', 'pattr[description]', $product->getDescription()));
$txtDesc->get_a('ckEditorControl')->setAttribute('rows', 10);
echo $txtDesc;
//note
$txtNote = new ControlGroupDecorator('Note:', new ckEditorControl('txtNote', 'pattr[note]', $product->getNote()));
$txtNote->get_a('ckEditorControl')->setAttribute('rows', 10);
echo $txtNote;
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

