<?php
/* @var $product ProductFixedDomain */
/* @var $categories CategoryDomain */
?>
<?php foreach ($categories as $cate): ?>
    <div class="left">
        <?php
        $inputID = "radCate{$cate->id}";
        $checked = $product->fkCategory == $cate->id ? 'checked' : '';
        $disabled = $cate->isContainer ? 'disabled' : '';
        echo str_repeat('&nbsp;', substr_count($cate->pathSort, '/') * 4);
        ?>
        <input type="radio" name="radCate" value="<?php echo $cate->id ?>" id="<?php echo $inputID ?>" <?php echo $checked . ' ' . $disabled ?>>
        <label class="inline" for="<?php echo $inputID ?>"><?php echo $cate->name ?></label>
    </div>
<?php endforeach; ?>


