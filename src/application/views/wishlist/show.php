<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* @var $wishlist WishlistDomain */
?>
<div ng-app ng-controller="showWishlistController" class="row-wrapper">
    <h3 class="left">Your Wishlist</h3>
    <div class="cart-left">
        <table class="table-product">
            <thead>
                <tr>
                    <th width="100">&nbsp;</th>
                    <th width="400">PRODUCT</th>
                    <th width="180" class="right">PRICE</th>
                    <th width="200" class="center">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="product in products" ng-class-even="'even'" ng-class-odd="'odd'">
                    <td class="center">
                        <a href="{{product.url}}" title="product thumbnail">
                            <img class="product-thumbnail" src="{{product.thumbnail}}" alt="product thumbnail">
                        </a>
                    </td>
                    <td>
                        <a href="{{product.url}}" class="product-name">{{product.name}}</a><br>
                        <span class="product-seller">{{product.sellerName}}</span><br>
                        <span class="green" ng-if="product.stock > 10">In stock</span>
                        <span class="red" ng-if="product.stock <= 10 && product.stock > 0">Just {{product.stock}} left</span>
                        <span class="red" ng-if="product.stock <= 0">Out of stock</span>
                    </td>
                    <td class="right">
                        <span class="product-price">{{fnMoneyToString(product.price + product.taxes)}}</span>
                    </td>
                    <td class="center">
                        <a href="javascript:;" ng-click="addToCart(product.wishlistDetailID)">Add to Cart</a><br>
                        <a href="javascript:;" ng-click="remove(product.wishlistDetailID)">Remove</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div ng-repeat="detailInstance in wislistDetails">
            <div>{{detailInstance.name}}</div>
            <div>{{detailInstance.price}}</div>
            <div>

            </div>
        </div>
    </div><!--cart left-->
    <div class="clearfix"></div>
</div><!--controller-->
<br>
<script>
    var scriptData = {};
    scriptData.wishlistID = <?php echo $wishlist->id ?>;
    scriptData.addToCartURL = '<?php echo base_url('wishlist/addToCart') ?>/';
    scriptData.removeURL = '<?php echo base_url('wishlist/remove') ?>/';
    scriptData.detailServiceURL = '<?php echo base_url('wishlist/wishlistDetailService/' . $wishlist->id) ?>/';
    scriptData.undoURL = '<?php echo base_url('wishlist/undoRemove') ?>/';
    scriptData.fnMoneyToString = <?php echo getJavascriptMoneyFunction(User::getCurrentUser()->getCurrency()) ?>;
</script>
<script src="/js/controller/WishlistCtrl.js"></script>



