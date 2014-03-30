<?php
defined('BASEPATH') or die('No direct script access allowed');
/* @var $product ProductFixedDomain */
$images = $product->getImages();
$first_image = reset($images);
$addToCartUrl = site_url('account/addToCart/');
?>
<div>
    <h3><?php echo $product->getName() ?></h3>
</div>

<div>
    <div>
        <img src="<?php echo $first_image->getTrueValue() ?>">
    </div>
    <div>
        <?php while ($image = next($images)): ?>
            <img src="<?php echo $image->getTrueValue() ?>">
        <?php endwhile; ?>
    </div>
</div>
<div>
    <h4>Thông tin chi tiết</h4>
    <p>
        <?php echo $product->getDescription() ?>
    </p>
</div>
<div>
    <h4><?php echo $product->getName() ?></h4>
    <?php var_dump('price', $product->getPrice('USD')->getTrueValue()) ?><br>
    <?php var_dump('quantity', $product->getQuantity()->getTrueValue()) ?>

    <a href="javascript:;" class="add-to-cart" data-id="<?php echo $product->id ?>">Add to cart</a>
</div>
<script>
    var scriptData = {};
    scriptData.addToCartURL = '<?php echo $addToCartUrl ?>';
</script>
<script>
    (function(window, scriptData, $, undefined) {
        $(function() {
            $('.add-to-cart').click(function() {
                window.location = scriptData.addToCartURL + '/' + $(this).attr('data-id');
            });
        });
    })(window, scriptData, $);

</script>