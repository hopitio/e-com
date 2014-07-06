<?php
defined('DS') or die('no direct script access allowed');

/* @var $product ProductFixedDomain */
//madein
$selected = $product->getMadeIn();
if ($selected)
{
    $selected = $selected->getTrueValue()->id;
}
else
{
    $selected = 0;
}
$selMadeIn = new ControlGroupDecorator('Sản xuất tại:', new SelectEnumControl('selMadeIn', 'pattr[made_in]', 'country', $selected));
$selMadeIn->get_a('SelectControl')->addClass('input-size-medium')->addOption('0', 'Null', true);
echo $selMadeIn;
//import from
$selected = $product->getImportFrom();
if ($selected)
{
    $selected = $selected->getTrueValue()->id;
}
else
{
    $selected = 0;
}
$selImportFrom = new ControlGroupDecorator('Nhập khẩu từ:', new SelectEnumControl('selImportFrom', 'pattr[import_from]', 'country', $selected));
$selImportFrom->get_a('SelectControl')->addClass('input-size-medium')->addOption('0', 'Null', true);
echo $selImportFrom;
?>

<?php
//meta title
$txtMetaTitle = new WrapDecorator('div', 'col-xs-8 row', new TextboxInput('txtMetaTitle', 'pattr[meta_title]', (string) $product->getMetaTitle()));
echo $txtMetaTitle->decorate(new ControlGroupDecorator('Meta Title:'));
//meta keywords
$txtMetaKeywords = new WrapDecorator('div', 'col-xs-8 row', new TextareaControl('txtMetaKeywords', 'pattr[meta_keywords]', (string) $product->getMetaKeywords()));
$txtMetaKeywords->get_a('TextareaControl')->setAttribute('rows', 10);
echo $txtMetaKeywords->decorate(new ControlGroupDecorator('Meta Keywords:'));
//meta description
$txtMetaDescription = new WrapDecorator('div', 'col-xs-8 row', new TextareaControl('txtMetaDescription', 'pattr[meta_description]', (string) $product->getMetaDescription()));
$txtMetaDescription->get_a('TextareaControl')->setAttribute('rows', 10);
echo $txtMetaDescription->decorate(new ControlGroupDecorator('Meta Description:'));

