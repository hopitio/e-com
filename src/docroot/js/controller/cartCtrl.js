angular.module('lynx')
        .controller('showCartCtrl', ['$scope', '$http', 'cartService', function ($scope, $http, cartService) {
                $scope.products = [];
                cartService.registerLoadProducts(function (products) {
                    $scope.products = products;
                });

                $scope.range = function (start, end) {
                    var ret = [];
                    for (var i = start; i <= end; i++) {
                        ret.push(i);
                    }
                    return ret;
                };

                $scope.fnMoneyToString = window.fnMoneyToString;

                var ajaxReq;
                $scope.selQtyOnchange = function () {
                    var data = {products: {}};
                    if (ajaxReq) {
                        ajaxReq.abort();
                        ajaxReq = null;
                    }
                    for (var i in $scope.products) {
                        var product = $scope.products[i];
                        data.products[product.id] = product.quantity;
                    }
                    setTimeout(function () {
                        ajaxReq = $.ajax({
                            type: 'post',
                            url: '/cart/updateQuantityService',
                            data: data
                        });
                    }, 200);
                };

                $scope.removeProduct = cartService.removeProduct;

                $scope.getProductSubtotal = function () {
                    var ret = 0;
                    for (var i in $scope.products) {
                        ret += $scope.products[i].price * $scope.products[i].quantity;
                    }
                    return ret;
                };

                $scope.getTotal = function () {
                    var ret = 0;
                    for (var i in $scope.products) {
                        ret += $scope.products[i].price * $scope.products[i].quantity;
                    }
                    return ret;
                };

                $scope.next = function () {
                    if (!$scope.products.length) {
                        return;
                    }
                    window.location.href = '/cart/shipping';
                };

                $scope.countProducts = cartService.countProducts;
            }]);

