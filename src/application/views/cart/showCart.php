<?php
defined('BASEPATH') or die('No direct script access allowed');
/* @var $products CartDomain */
?>

<div ng-app="showCartApp" ng-controller="showCartCtrl">
    <div ng-repeat="product in products">
        <div>Name: {{product.name}}</div>
        <div>Price: {{product.price}}</div>
        <div>*: {{product.price * product.quantity}}</div>
        <div>
            <input 
                type="text" name="txtProductQuantity[{{product.id}}]" txtquantity product="product"
                id="product_{{product.id}}" value="{{product.quantity}}" ng-model="product.quantity"
                >
        </div>
    </div>
    <div>
        <div>subtotal({{products.length}} items): {{calTotal()}}</div>
        <a href="javascript:;" ng-click="checkout()">Proceed to Checkout</a>
    </div>
</div>


<script>
    var scriptData = {};
    scriptData.serviceURL = '<?php echo site_url('cart/cartProductsService') ?>';
    scriptData.checkoutURL = '<?php echo site_url('cart/shipping') ?>';
    scriptData.updateQuantityURL = '<?php echo site_url('cart/updateQuantityService') ?>';
</script>
<script>
    (function(window, angular, scriptData, $, undefined) {
        angular.module('showCartApp', [])
                .controller('showCartCtrl', showCartCtrl)
                .directive('txtquantity', txtQuantityDirective);

        function txtQuantityDirective() {
            function link(scope, elm, attrs) {
                elm.keyup(function() {
                    if (scriptData.updateTimeout) {
                        window.clearTimeout(scriptData.updateTimeout);
                    }
                    scriptData.updateTimeout = window.setTimeout(function() {
                        var data = {products: {}};
                        data.products[scope.product.id] = scope.product.quantity;
                        $.ajax({
                            type: 'post',
                            url: scriptData.updateQuantityURL,
                            data: data,
                            success: function() {
                                //TODO
                            },
                            error: function() {
                                //TODO
                            }
                        });
                    }, 500);
                });
            }//link
            return {
                scope: {product: '='},
                link: link
            };
        }//directive

        function showCartCtrl($scope, $http) {
            $scope.products = [];
            $http.get(scriptData.serviceURL, {cache: false}).success(function(data) {
                $scope.products = data;
            }).error(function() {

            });
            $scope.calTotal = function() {
                var total = 0;
                for (var i in $scope.products) {
                    var product = $scope.products[i];
                    total += product.price * product.quantity;
                }
                return total;
            };
            $scope.checkout = function() {
                window.location = scriptData.checkoutURL;
            };
        }//controller

    })(window, angular, window.scriptData, $);

</script>

