<?php

defined('DS') or die('no direct access allowed');

class ckEditorControl extends TextareaControl
{

    function draw()
    {
        $id = $this->attributes('id');
        return parent::draw() . "<script>$(function(){CKEDITOR.replace('$id');})</script>";
    }

}
