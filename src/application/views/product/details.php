<?php
defined('BASEPATH') or die('No direct script access allowed');
/* @var $product ProductFixedDomain */
$images = $product->getImages();
$first_image = reset($images);
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

    <a href="javascript:;" class="add-to-cart" data-id="<?php echo $product->id ?>">Add to Cart</a>
    <a href="javascript:;" class="add-to-wishlist" data-id="<?php echo $product->id ?>">Add to Wishlist</a>
    <a href="javascript:;" class="add-to-pin" data-id="<?php echo $product->id ?>">Pin</a>
</div>
<script>
    var scriptData = {};
    scriptData.addToCartURL = '<?php echo site_url('account/addToCart/') ?>';
    scriptData.addToWishlistURL = '<?php echo site_url('wishlist/addToWishlist/') ?>';
</script>
<script>
    (function(window, scriptData, $, undefined) {
        $(function() {
            $('.add-to-cart').click(function() {
                $.ajax({
                    cache: false,
                    url: scriptData.addToCartURL + '/' + $(this).attr('data-id'),
                    success: function() {
                        //TODO
                    },
                    error: function() {
                        //TODO
                    }
                });
            });
            $('.add-to-wishlist').click(function() {
                $.ajax({
                    cache: false,
                    url: scriptData.addToWishlistURL + '/' + $(this).attr('data-id'),
                    success: function() {
                        //TODO
                    },
                    error: function() {
                        //TODO
                    }
                });
            });
        });
    })(window, scriptData, $);

</script>