<?php
/* @var $product ProductFixedDomain */
?>
<div class="well">
    <input type="file" name="fileImage[]" multiple onchange="fileOnchange(this);" accept="image/jpeg">
</div>
<table class="table">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th width="15%">Ảnh</th>
            <th width="15%">Là ảnh đại diện</th>
            <th width="15%">Là ảnh chính</th>
            <th width="20%">Là ảnh Facebook</th>
            <th width="10%">Số thứ tự</th>
            <th width="15%">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        $imgTypes = array('thumbnail' => false, 'baseImage' => true, 'facebookImage' => false); //true = array, false = single
        ?>
        <?php foreach ($product->getImages() as $img): ?>
            <tr>
                <td>
                    <?php echo ++$i ?>
                    <input type="hidden" name="hdnImage[]" value="<?php echo $img->fkFile ?>">
                </td>
                <td>
                    <a href="<?php echo $img->url ?>" target="_blank" title="img">
                        <img width="160" height="120" src="<?php echo $img->url ?>">
                    </a>
                </td>
                <?php foreach ($imgTypes as $imgType => $multiple): ?>
                    <?php $checked = $img->{$imgType} == 1 ? 'checked' : '' ?>
                    <td>
                        <?php if ($multiple): ?>
                            <input type="checkbox" name="chkType[<?php echo $img->fkFile ?>][<?php echo $imgType ?>]" <?php echo $checked ?>>
                        <?php else: ?>
                            <input type="radio" name="radType[<?php echo $imgType ?>]" value="<?php echo $img->fkFile ?>" <?php echo $checked ?>>
                        <?php endif; ?>
                    </td>
                <?php endforeach; ?>
                <td>
                    <input type="text" class="form-control" name="txtSort[<?php echo $img->fkFile ?>]" value="<?php echo (int) $img->sort ?>" >
                </td>
                <td>
                    <a href="<?php echo "/seller/delete_image/?product={$product->id}&file={$img->fkFile}&language={$lang}" ?>" title="Xóa">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    function fileOnchange(input) {
        if (input.val == '') {
            return;
        }
        //$('#btn-apply').click();
    }
</script>