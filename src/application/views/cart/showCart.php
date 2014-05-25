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
                <tr class="even">
                    <td class="center">
                        <img class="product-thumbnail" src="http://localhost.com:8080/uploads/2014/05/22/46c46554bfc2ffb6e8ce0f6dca210b9a.jpg">
                    </td>
                    <td>
                        <a href="javascript:;" class="product-name">Product name</a><br>
                        <span class="product-seller">By seller name</span><br>
                        <span class="green">In stock</span>
                    </td>
                    <td class="right">
                        <span class="product-price">$60.00</span><br>
                        <span class="product-original-price">($100)</span>
                    </td>
                    <td class="center">
                        <select>
                            <option value="1">1</option>
                        </select>
                        <br>
                        <a href="javascript:;">
                            Remove from cart
                        </a><br>
                        <a href="javascript:;">
                            Buy later
                        </a>
                    </td>
                    <td class="center">
                        <span class="product-price">$60.00</span>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="center">
                        <img class="product-thumbnail" src="http://localhost.com:8080/uploads/2014/05/22/46c46554bfc2ffb6e8ce0f6dca210b9a.jpg">
                    </td>
                    <td>
                        <a href="javascript:;" class="product-name">Product name</a><br>
                        <span class="product-seller">By seller name</span><br>
                        <span class="green">In stock</span>
                    </td>
                    <td class="right">
                        <span class="product-price">$60.00</span><br>
                        <span class="product-original-price">($100)</span>
                    </td>
                    <td class="center">
                        <select>
                            <option value="1">1</option>
                        </select>
                        <br>
                        <a href="javascript:;">
                            Remove from Cart
                        </a><br>
                        <a href="javascript:;">
                            Add to Wishlist
                        </a>
                    </td>
                    <td class="center">
                        <span class="product-price">$60.00</span>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <a href="javascript:;"><i class="fa fa-gift"></i> Enter Giftcode</a>
                        <?php echo str_repeat('&nbsp;', 16) ?>
                        <a href="javascript:;"><i class="fa fa-play"></i> Continue shopping</a>
                    </td>
                    <td class="right">
                        <span class="product-total-label">TOTAL:</span><br>
                        <span class="product-save-label">You save:</span>
                    </td>
                    <td class="center ">
                        <span class="product-total-price">$180.00</span><br>
                        <span class="product-save-price">$40.00</span>
                    </td>
                </tr>
            </tbody>
        </table>

        <h3 class="left">Wishlist</h3>
        <table class="table-product">
            <tbody>
                <tr>
                    <td width="100" class="center">
                        <img class="product-thumbnail" src="http://localhost.com:8080/uploads/2014/05/22/46c46554bfc2ffb6e8ce0f6dca210b9a.jpg">
                    </td>
                    <td width="400">
                        <a href="javascript:;" class="product-name">Product name</a><br>
                        <span class="product-seller">By seller name</span><br>
                        <span class="green">In stock</span>
                    </td>
                    <td width="100">
                        <span class="product-price">$60.00</span><br>
                        <span class="product-original-price">($100)</span>
                    </td>
                    <td width="100">&nbsp;</td>
                    <td width="190" class="center">
                        <input type="button" class="btn btn-primary" value="Add to Cart"><br>
                        <a href="javascript:;">Remove</a><br>
                        <a href="javascript:;">Wishlist</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div><!--cart-left-->
    <div class="cart-right">
        <div class="cart-right-content">
            <h4 class="left">Cart summaries</h4>
            <div class="summary-row">
                <div class="row-left">Products (3):</div>
                <div class="row-right">$180</div>
            </div>
            <div class="summary-row">
                <div class="row-left">Shipping:</div>
                <div class="row-right">?-----</div>
            </div>
            <hr>
            <div class="summary-row">
                <div class="row-left">Subtotal:</div>
                <div class="row-right">$180</div>
            </div>
            <div class="summary-row">
                <div class="row-left">Taxes:</div>
                <div class="row-right">$0.00</div>
            </div>
            <hr>
            <div class="summary-row total">
                <div class="row-left">Total:</div>
                <div class="row-right">$180</div>
            </div>
            <div class="summary-row saving">
                <div class="row-left">You save:</div>
                <div class="row-right">$40.00</div>
            </div>
        </div>
        <input type="button" class="btn btn-lg btn-primary form-control" value="CHECKOUT">
    </div><!--cart-right-->
</div<!--row-wrapper-->
<div class="clearfix"></div>
<div ng-app="showCartApp" ng-controller="showCartCtrl">
    <div ng-show="undo">
        Your item has been removed from Cart. <a href="javascript:;" ng-click="undoRemove()">Click here</a> to undo.
    </div>
    <div ng-repeat="product in products">
        <div>Name: {{product.name}}</div>
        <div>Price: {{product.price}}</div>
        <div>Taxes: {{product.taxes}}</div>
        <div>*: {{(product.price + product.taxes) * product.quantity}}</div>
        <div>
            <input 
                type="text" name="txtProductQuantity[{{product.id}}]" txtquantity product="product"
                id="product_{{product.id}}" value="{{product.quantity}}" ng-model="product.quantity"
                >
            <a href="javascript:;" ng-click="removeFromCart(product.id)">Remove from Cart</a>
        </div>
    </div>
    <div>
        <div>subtotal({{products.length}} items): {{calTotal()}}</div>
        <a href="javascript:;" ng-click="checkout()">Proceed to Checkout</a>
    </div>

</div>


<script>
    var scriptData = {};
    scriptData.serviceURL = '<?php echo base_url('cart/cartProductsService') ?>';
    scriptData.checkoutURL = '<?php echo base_url('cart/shipping') ?>';
    scriptData.updateQuantityURL = '<?php echo base_url('cart/updateQuantityService') ?>';
    scriptData.removeFromCartURL = '<?php echo base_url('cart/removeFromCart') ?>/';
    scriptData.addToCartURL = '<?php echo base_url('cart/addToCart') ?>/';
</script>
