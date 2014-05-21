<?php

defined('DS') or die('no direct script access allowed');

/* @var $product ProductFixedDomain */

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

