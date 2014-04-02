<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* @var $wishlist WishlistDomain */
?>

<?php foreach ($wishlist->getDetails() as $detailInstance): ?>
    <div><?php echo $detailInstance->getName()->getTrueValue() ?></div>
    <div>
        <a href="javascript:;" class="add-to-cart" data-id="<?php echo $detailInstance->fkProduct ?>">Add to Cart</a>
        <a href="javascript:;" class="remove-from-wishlist" data-id="<?php echo $detailInstance->id ?>">Remove</a>
    </div>
<?php endforeach; ?>
<script>
    var scriptData = {};
    scriptData.addToCartURL = '<?php echo site_url('wishlist/addToCart') ?>/';
    scriptData.removeURL = '<?php echo site_url('wishlist/remove') ?>/';
</script>
<script>
    (function(window, $, scriptData, undefined) {
        $(function() {
            $('.add-to-cart').click(function() {
                $.ajax({
                    cache: false,
                    url: scriptData.addToCartURL,
                    success: function() {
                        window.location.reload();
                    },
                    error: function() {
                        //TODO
                    }
                });
            });
            $('.remove-from-wishlist').click(function() {
                $.ajax({
                    cache: false,
                    url: scriptData.removeURL,
                    success: function() {
                        window.location.reload();
                    },
                    error: function() {
                        //TODO
                    }
                });
            });
        });
    })(window, $, scriptData);
</script>



