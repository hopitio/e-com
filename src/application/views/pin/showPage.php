<?php
defined('BASEPATH') or die('no direct script allowed');
?>

<div ng-app ng-controller="pinShowCtrl">
    <div ng-show="undoRemoveID">Your item has been successfully removed. You can <a href="javascript:;" ng-click="undoRemove()">undo here</a>.</div>
    <div ng-repeat="product in pinList">
        <div>
            <div>{{product.name}}</div>
            <div>{{product.description}}</div>
            <div>USD{{product.price}}</div>
            <div>{{product.quantity}}</div>
            <div>
                <a href="javascript:;" ng-click="addToCart(product.id);">Add to Cart</a>
                <a href="javascript:;" ng-click="moveToWishlist(product.id);">Move to Wishlist</a>
                <a href="javascript:;" ng-click="unpin(product.id);">Remove</a>
            </div>
        </div>
    </div>
</div>
<script>
    var scriptData = {};
    scriptData.service = '<?php echo site_url('pin/getAllPinService') ?>';
    scriptData.addToCart = '<?php echo site_url('pin/addToCart') ?>/';
    scriptData.moveToWishlist = '<?php echo site_url('pin/moveToWishlist') ?>/';
    scriptData.remove = '<?php echo site_url('pin/unpin') ?>/';
    scriptData.pin = '<?php echo site_url('pin/pinProduct') ?>/';
</script>
<script>
    (function(window, $, scriptData, undefined) {
        window.pinShowCtrl = function($scope, $http) {
            $scope.pinList = [];
            $scope.undoRemoveID;
            function getList() {
                $http.get(scriptData.service, {cache: false}).success(function(list) {
                    $scope.pinList = list;
                }).error(function() {
                    //TODO
                });
            }
            getList();

            $scope.addToCart = function(productID) {
                $http.get(scriptData.addToCart + productID, {cache: false}).success(function() {
                    getList();
                }).error(function() {
                    //TODO
                });
            };

            $scope.moveToWishlist = function(productID) {
                $http.get(scriptData.moveToWishlist + productID, {cache: false}).success(function() {
                    getList();
                }).error(function() {
                    //TODO
                });
            };

            $scope.unpin = function(productID) {
                $http.get(scriptData.remove + productID, {cache: false}).success(function() {
                    getList();
                    $scope.undoRemoveID = productID;
                }).error(function() {
                    //TODO
                });
            };

            $scope.undoRemove = function() {
                $http.get(scriptData.pin + $scope.undoRemoveID, {cache: false}).success(function() {
                    getList();
                    $scope.undoRemoveID = null;
                }).error(function() {
                    //TODO
                });
            };
        };
    })(window, $, scriptData);
</script>