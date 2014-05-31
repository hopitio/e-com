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
$selReturnPolicy = new ControlGroupDecorator('Return n Exchange(days):', new SelectControl('selReturnPolicy', 'pattr[return_policy]', array(), $selected));
$selReturnPolicy->get_a('SelectControl')
        ->addClass('input-size-medium')
        ->addOption('0', 'No return policy', true)
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
$selWarrantyPolicy = new ControlGroupDecorator('Warranty(days):', new SelectControl('selWarrantyPolicy', 'pattr[warranty_policy]', array(), $selected));
$selWarrantyPolicy->get_a('SelectControl')
        ->addClass('input-size-medium')
        ->addOption('0', 'No warranty', true)
        ->addOption('7', '7')
        ->addOption('15', '15')
        ->addOption('30', '30')
        ->addOption('9999', 'Product lifetime');
echo $selWarrantyPolicy;
