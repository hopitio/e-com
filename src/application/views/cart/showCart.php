<?php
defined('BASEPATH') or die('No direct script access allowed');
/* @var $products CartDomain */
?>

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
