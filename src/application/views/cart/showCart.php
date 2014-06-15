<?php
defined('BASEPATH') or die('No direct script access allowed');
/* @var $products CartDomain */
?>
<h1></h1>
<ul class="cart-breadcrums">
    <li class="bc-label"><i class="fa fa-shopping-cart"></i> YOUR CART</li>
    <li class="active"><?php echo htmlentities('>>>') ?>&nbsp;<a href="javascript:;">PLACE ORDER</a></li>
    <li><?php echo htmlentities('>>>') ?>&nbsp;<a href="javascript:;">SHIPPING INFO</a></li>
    <li><?php echo htmlentities('>>>') ?>&nbsp;<a href="javascript:;">PAYMENT INFO</a></li>
</ul>
<div ng-app="showCartApp" ng-controller="showCartCtrl">
    <div class="row-wrapper left">
        <a class="cart-back" href="javascript:;" title="Go Back"><i class="fa fa-arrow-left"></i> Go Back</a>
    </div>
    <div class="row-wrapper">
        <div class="cart-left">
            <div class="notification">
                <h4>Notification</h4>
                <ul>
                    <li>- Bạn đang tiết kiệm được <b class="green">$40.00</b></li>
                    <li>- Chỉ cần mua thêm $20, bạn sẽ được <u>miễn phí vận chuyển cả đơn hàng</u>. Những món đồ <a href="javascript:;"><u>$20.00 ở đây</u></a></li>
                </ul>
            </div>
            <br>
            <table class="table-product">
                <thead>
                    <tr>
                        <th width="100">&nbsp;</th>
                        <th width="400">PRODUCT</th>
                        <th width="100" class="right">PRICE</th>
                        <th width="190" class="center">QTY</th>
                        <th width="100" class="center">SUBTOTAL</th>
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
                            <span class="product-price">{{fnMoneyToString(product.price + product.taxes)}}</span><br>
                            <!--<span class="product-original-price">($100)</span>-->
                        </td>
                        <td class="center">
                            <select ng-model="product.quantity" ng-change="updateQty(product)">
                                <option ng-repeat="qtyVal in qtyRange track by $index" ng-selected="product.quantity == $index"
                                        value="{{$index}}" ng-if="$index" ng-model="product.quantity">{{$index}}</option>
                            </select>
                            <br>
                            <a href="javascript:;" ng-click="removeFromCart(product.id)">
                                Remove from cart
                            </a><br>
                            <a href="javascript:;">
                                Move to Wishlist
                            </a>
                        </td>
                        <td class="center">
                            <span class="product-price">{{fnMoneyToString((product.price + product.taxes) * product.quantity)}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="2">
                            <!--
                            <a href="javascript:;"><i class="fa fa-gift"></i> Enter Giftcode</a>
                            <?php echo str_repeat('&nbsp;', 16) ?>
                            -->
                            <a href="/"><i class="fa fa-play"></i> Continue shopping</a>
                        </td>
                        <td class="right">
                            <span class="product-total-label">TOTAL:</span><br>
                            <!--<span class="product-save-label">You save:</span>-->
                        </td>
                        <td class="center">
                            <span class="product-total-price">{{fnMoneyToString(calPriceOnly() + calTaxes())}}</span><br>
                            <!--<span class="product-save-price">$40.00</span>-->
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php if (User::getCurrentUser()->is_authorized): ?>
                <h3 class="left">Wishlist</h3>
                <table class="table-product">
                    <tbody>
                        <tr ng-repeat="product in wishlist" ng-class-even="'event'" ng-class-odd="'odd'">
                            <td width="100" class="center">
                                <img class="product-thumbnail" src="{{product.thumbnail}}">
                            </td>
                            <td width="400">
                                <a href="javascript:;" class="product-name">{{product.name}}</a><br>
                                <span class="product-seller">{{product.seller_name}}</span><br>
                                <span class="green" ng-if="product.stock > 10">In stock</span>
                                <span class="red" ng-if="product.stock <= 10 && product.stock > 0">Just {{product.stock}} left</span>
                                <span class="red" ng-if="product.stock <= 0">Out of stock</span>
                            </td>
                            <td width="100">
                                <span class="product-price">{{fnMoneyToString(product.price)}}</span><br>
                                <!--<span class="product-original-price">($100)</span>-->
                            </td>
                            <td width="100">&nbsp;</td>
                            <td width="190" class="center">
                                <input type="button" class="btn btn-primary" ng-click='addToCart(product.wishlistDetailID)' value="Add to Cart"><br>
                                <a href="javascript:;" ng-click='removeFromWishlist(product.wishlistDetailID)'>Remove</a><br>
                                <a href="/wishlist/show" >Wishlist</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php endif; ?>
        </div><!--cart-left-->
        <div class="cart-right">
            <div class="cart-right-content">
                <h4 class="left">Cart summaries</h4>
                <div class="summary-row">
                    <div class="row-left">Products ({{products.length}}):</div>
                    <div class="row-right">{{fnMoneyToString(calPriceOnly())}}</div>
                </div>
                <div class="summary-row">
                    <div class="row-left">Shipping:</div>
                    <div class="row-right">?-----</div>
                </div>
                <hr>
                <div class="summary-row">
                    <div class="row-left">Subtotal:</div>
                    <div class="row-right">{{fnMoneyToString(calPriceOnly())}}</div>
                </div>
                <div class="summary-row">
                    <div class="row-left">Taxes:</div>
                    <div class="row-right">{{fnMoneyToString(calTaxes())}}</div>
                </div>
                <hr>
                <div class="summary-row total">
                    <div class="row-left">Total:</div>
                    <div class="row-right">{{fnMoneyToString(calPriceOnly() + calTaxes())}}</div>
                </div>
                <!--
                <div class="summary-row saving">
                    <div class="row-left">You save:</div>
                    <div class="row-right">$40.00</div>
                </div>
                -->
            </div>
            <input type="button" class="btn btn-lg btn-primary form-control" value="CHECKOUT" ng-click="checkout()">
        </div><!--cart-right-->
    </div<!--row-wrapper-->
    <div class="clearfix"></div>

</div><!--angular-->
<br>

<script>
    var scriptData = {};
    scriptData.serviceURL = '<?php echo base_url('cart/cartProductsService') ?>';
    scriptData.checkoutURL = '<?php echo base_url('cart/shipping') ?>';
    scriptData.updateQuantityURL = '<?php echo base_url('cart/updateQuantityService') ?>';
    scriptData.removeFromCartURL = '<?php echo base_url('cart/removeFromCart') ?>/';
    scriptData.addToCartURL = '/wishlist/addToCart/';
    scriptData.removeFromWishlistURL = '/wishlist/remove/';
    scriptData.fnMoneyToString = <?php echo getJavascriptMoneyFunction(User::getCurrentUser()->getCurrency()) ?>;
</script>
<?php if (User::getCurrentUser()->is_authorized)  ?><script>scriptData.wishlistServiceURL = '/wishlist/wishlistDetailService/<?php echo $wishlist->id ?>';</script>

