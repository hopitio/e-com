<?php

defined('BASEPATH') or die('no direct access alowed');
/* @var $product ProductFixedDomain */

//return
$selected = $product->getReturnPolicy();
if ($selected)
{
    $selected = (int) $selected->getTrueValue();
}
else
{
    $selected = 0;
}
$selReturnPolicy = new ControlGroupDecorator('Số ngày có thể hoàn trả/đổi hàng:', new SelectControl('selReturnPolicy', 'pattr[return_policy]', array(), $selected));
$selReturnPolicy->get_a('SelectControl')
        ->addClass('input-size-medium')
        ->addOption('0', 'Không có điều khoản hoàn trả', true)
        ->addOption('3', '3')
        ->addOption('7', '7')
        ->addOption('30', '30');
echo $selReturnPolicy;

//warranty
$selected = $product->getWarrantyPolicy();
if ($selected)
{
    $selected = (int) $selected->getTrueValue();
}
else
{
    $selected = 0;
}
$selWarrantyPolicy = new ControlGroupDecorator('Số ngày bảo hành:', new SelectControl('selWarrantyPolicy', 'pattr[warranty_policy]', array(), $selected));
$selWarrantyPolicy->get_a('SelectControl')
        ->addClass('input-size-medium')
        ->addOption('0', 'Không bảo hành', true)
        ->addOption('7', '7')
        ->addOption('15', '15')
        ->addOption('30', '30')
        ->addOption('9999', 'Suốt thời gian sử dụng');
echo $selWarrantyPolicy;
