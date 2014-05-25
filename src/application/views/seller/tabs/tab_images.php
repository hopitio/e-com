<?php
/* @var $product ProductFixedDomain */
?>
<div class="left">
    *This page will not automatically saved. Please click Apply or Save when you finish editting.
</div>
<br>
<input type="file" name="fileImage" multiple onchange="fileOnchange(this);" accept="image/*">
<table class="table">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th width="15%">Image</th>
            <th width="10%">Thumbnail</th>
            <th width="10%">Base Image</th>
            <th width="15%">Small Image</th>
            <th width="15%">Main Image</th>
            <th width="15%">Sort</th>
            <th width="10">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        $imgTypes = array('thumbnail' => false, 'baseImage' => true, 'smallImage' => true, 'mainImage' => false); //true = array, false = single
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
                    <a href="<?php echo "/seller/delete_image/?product={$product->id}&file={$img->fkFile}&language={$lang}" ?>" title="Delete">Delete</a>
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
        $('#btn-apply').click();
    }
</script>