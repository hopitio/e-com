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
//status
$chkStatus = new LabelDecorator('Active', new CheckboxInput('chkStatus', 'chkStatus', $product->status == 1 || !$product->id));
echo $chkStatus->decorate(new ControlGroupDecorator());
//description
$txtDesc = new WrapDecorator('div', 'col-xs-8 row', new ckEditorControl('txtDesc', 'pattr[description]', $product->getDescription()));
$txtDesc->get_a('ckEditorControl')->setAttribute('rows', 10);
echo $txtDesc->decorate(new ControlGroupDecorator('Description:'));
?>
<script>
    $('#selCodeType').change(function() {
        if ($(this).val() == '0')
            $('#txtCode').attr('disabled', 'disabled');
        else
            $('#txtCode').removeAttr('disabled');
    }).trigger('change');
</script>

