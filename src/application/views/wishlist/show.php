<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* @var $wishlist WishlistDomain */
?>
<div ng-app ng-controller="showWishlistController" class="width-960">
    <h3 class="left"><?php echo $language[$view->view]->title; ?></h3>
    <div style="color: grey"><?php echo $language[$view->view]->subtitle ?></div>
    <div class="cart-left">
        <table class="product-table">
            <thead>
                <tr>
                    <th width="100">&nbsp;</th>
                    <th width="400"><?php echo $language[$view->view]->colProduct; ?></th>
                    <th width="180" class="right"><?php echo $language[$view->view]->colPrice; ?></th>
                    <th width="200" class="center"><?php echo $language[$view->view]->colAction; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-if="!products.length">
                    <td colspan="4"><?php echo $language[$view->view]->lblNoProduct ?></td>
                </tr>
                <tr ng-repeat="product in products" ng-class-even="'even'" ng-class-odd="'odd'">
                    <td class="center">
                        <a href="{{product.url}}" title="product thumbnail">
                            <img class="product-thumbnail" src="/thumbnail.php/{{product.thumbnail}}/w=200" alt="product thumbnail">
                        </a>
                    </td>
                    <td class="left">
                        <a href="{{product.url}}" class="p-name">{{product.name}}</a><br>
                        <span class="product-seller">{{product.sellerName}}</span><br>
                        <span class="green" ng-if="product.stock > 10"><?php echo $language[$view->view]->lblInstock; ?></span>
                        <span class="red" ng-if="product.stock <= 10 && product.stock > 0"><?php echo $language[$view->view]->lblInstockQty; ?></span>
                        <span class="red" ng-if="product.stock <= 0"><?php echo $language[$view->view]->lblOutOfstock; ?></span>
                    </td>
                    <td class="right">
                        <span class="product-price"><strong>{{fnMoneyToString(product.price + product.taxes)}}</strong></span>
                    </td>
                    <td class="center">
                        <a href="javascript:;" ng-click="addToCart(product.wishlistDetailID)"><?php echo $language[$view->view]->lblAddToCart; ?></a><br>
                        <a href="javascript:;" ng-click="remove(product.wishlistDetailID)"><?php echo $language[$view->view]->lblRemoveItem; ?></a>
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



