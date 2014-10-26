<?php
defined('DS') or die('no direct script access allowed');
?>
<div class="form-group control-group">
    <label for="selMadeIn" class="col-xs-2 control-label">Sản xuất tại: </label>
    <div class="col-xs-10 controls">
        <div class="col-xs-8 row">
            <div class="col-xs-6 row">
                <?php
                /* @var $product ProductFixedDomain */
                $selected = $product->getMadeIn();
                if ($selected)
                {
                    $selected = $selected->getTrueValue()->id;
                }
                else
                {
                    $selected = 0;
                }
                $selMadeIn = new SelectEnumControl('selMadeIn', 'pattr[made_in]', 'country', $selected);
                $selMadeIn->get_a('SelectControl')->addClass('input-size-medium')->addOption('0', 'Khác', true);
                echo $selMadeIn;
                ?>
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

