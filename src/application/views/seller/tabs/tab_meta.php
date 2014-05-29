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
$selMadeIn = new ControlGroupDecorator('Made in:', new SelectEnumControl('selMadeIn', 'pattr[made_in]', 'country', $selected));
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
$selImportFrom = new ControlGroupDecorator('Import from:', new SelectEnumControl('selImportFrom', 'pattr[import_from]', 'country', $selected));
$selImportFrom->get_a('SelectControl')->addClass('input-size-medium')->addOption('0', 'Null', true);
echo $selImportFrom;
?>
<!--dimension-->
<div class="form-group">
    <label class="col-sm-3 control-label">Dimension:</label>
    <div class="col-sm-9">
        <div class="col-xs-8 row">
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" class="form-control input-sm" name="pattr[dimension_width]" id="txtDimensionWidth" placeholder="width" value="<?php echo $product->getDimensionWidth() ?>">
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control input-sm" name="pattr[dimension_height]" id="txtDimensionHeight" placeholder="height" value="<?php echo $product->getDimensionHeight() ?>">
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control input-sm" name="pattr[dimension_depth]" id="txtDimensionDepth" placeholder="depth" value="<?php echo $product->getDimensionDepth() ?>">
                </div>
            </div>
        </div>            
    </div>
</div>
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

