<?php
defined('BASEPATH') or die('no direct script allowed');
?>
<div ng-app ng-controller="pinShowCtrl" class="row-wrapper">
    <h3 class="left"><?php echo $language[$view->view]->title; ?></h3>
    <div class="cart-left">
        <table class="table-product">
            <thead>
                <tr>
                    <th width="100">&nbsp;</th>
                    <th width="400"><?php echo $language[$view->view]->colProduct; ?></th>
                    <th width="180" class="right"><?php echo $language[$view->view]->colPrice; ?></th>
                    <th width="200" class="center"><?php echo $language[$view->view]->colAction; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" ng-if="!pinList.length"><?php echo $language[$view->view]->lblNoProduct ?></td>
                </tr>
                <tr ng-repeat="product in pinList" ng-class-even="'even'" ng-class-odd="'odd'">
                    <td class="center">
                        <a href="{{product.url}}" title="product thumbnail">
                            <img class="product-thumbnail" src="/thumbnail.php/{{product.thumbnail}}/w=200" alt="product thumbnail">
                        </a>
                    </td>
                    <td>
                        <a href="{{product.url}}" class="product-name">{{product.name}}</a><br>
                        <span class="product-seller">{{product.sellerName}}</span><br>
                        <span class="green" ng-if="product.stock > 10"><?php echo $language[$view->view]->lblInstock; ?></span>
                        <span class="red" ng-if="product.stock <= 10 && product.stock > 0"><?php echo $language[$view->view]->lblInstockQty; ?></span>
                        <span class="red" ng-if="product.stock <= 0"><?php echo $language[$view->view]->lblOutOfstock; ?></span>
                    </td>
                    <td class="right">
                        <span class="product-price">{{product.price}}</span>
                    </td>
                    <td class="center">
                        <a href="javascript:;" ng-click="addToCart(product.id)"><?php echo $language[$view->view]->lblAddToCart; ?></a><br>
                        <a href="javascript:;" ng-click="moveToWishlist(product.id)"><?php echo $language[$view->view]->lblMoveToWishlist; ?></a><br>
                        <a href="javascript:;" ng-click="unpin(product.id);"><?php echo $language[$view->view]->lblRemoveItem; ?></a>
                    </td>
                </tr>
                <tr ng-show="loading">
                    <td colspan="4" class="center">
                        <img src="/images/loading.gif">
                    </td>
                </tr>
            </tbody>
        </table>
    </div><!--cartleft-->
</div>
<div class="clearfix"></div>
<br>
<script>
    var scriptData = {};
    scriptData.service = '<?php echo base_url('pin/getAllPinService') ?>';
    scriptData.addToCart = '<?php echo base_url('pin/addToCart') ?>/';
    scriptData.moveToWishlist = '<?php echo base_url('pin/moveToWishlist') ?>/';
    scriptData.remove = '<?php echo base_url('pin/unpin') ?>/';
    scriptData.pin = '<?php echo base_url('pin/pinProduct') ?>/';
</script>
<script>
    (function(window, $, scriptData, undefined) {
        window.pinShowCtrl = function($scope, $http) {
            $scope.pinList = [];
            $scope.loading;
            function getList() {
                var params = {offset: $scope.pinList.length};
                $scope.loading = $.ajax({
                    url: scriptData.service,
                    cache: false,
                    data: params,
                    success: function(list) {
                        $scope.loading = null;
                        for (var i in list) {
                            var product = list[i];
                            if (product.id)
                                $scope.pinList.push(product);
                        }
                        setTimeout(function() {
                            $scope.$apply();
                        });
                    },
                    error: function() {
                        //TODO
                    }
                });
                setTimeout(function() {
                    $scope.$apply();
                });
            }
            getList();

            $scope.addToCart = function(productID) {
                $http.get(scriptData.addToCart + productID, {cache: false}).success(function() {
                    $scope.removeProductFromView(productID);
                    window.refreshCart();
                }).error(function() {
                    //TODO
                });
            };

            $scope.removeProductFromView = function(productID) {
                for (var i in $scope.pinList) {
                    var product = $scope.pinList[i];
                    if (product.id == productID)
                        $scope.pinList.splice(i, 1);
                }
            };

            $scope.moveToWishlist = function(productID) {
                $http.get(scriptData.moveToWishlist + productID, {cache: false}).success(function() {
                    $scope.removeProductFromView(productID);
                }).error(function() {
                    //TODO
                });
            };

            $scope.unpin = function(productID) {
                $http.get(scriptData.remove + productID, {cache: false}).success(function() {
                    $scope.removeProductFromView(productID);
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

            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() && !$scope.loading) {
                    getList();
                }
            });
        };
    })(window, $, scriptData);
</script>