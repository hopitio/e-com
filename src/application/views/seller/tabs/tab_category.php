<?php
/* @var $product ProductFixedDomain */
/* @var $categories CategoryDomain */
?>
<?php foreach ($categories as $cate): ?>
    <div class="left">
        <?php
        $inputID = "radCate{$cate->id}";
        $checked = $product->fkCategory == $cate->id ? 'checked' : '';
        echo str_repeat('&nbsp;', substr_count($cate->pathSort, '/') * 6);
        ?>
        <?php if ($cate->isContainer == 0): ?>
            <input type="radio" name="radCate" value="<?php echo $cate->id ?>" id="<?php echo $inputID ?>" <?php echo $checked ?>>
        <?php endif; ?>
        <label class="inline" for="<?php echo $inputID ?>"><?php echo $cate->isContainer ? '<b>' . $cate->name . '</b>' : $cate->name ?></label>
    </div>
<?php
endforeach;


