$(document).ready(function() {
    $("#btnSubCheckout").click(function() {
        $("#frmMain").submit();
    });
    $('#frmMain').validate({});
});
(function(window, scriptData, $, undefined) {
    window.backToCart = function() {
        window.location = scriptData.cartURL;
    };

})(window, scriptData, $);

(function(window, scriptData, $, undefined) {
    window.shippingCtrl = function($scope, $http, $timeout) {
        $scope.province = 101;
        $scope.simpleShipData;
        $scope.cartProducts = [];
        $scope.fnMoneyToString = scriptData.fnMoneyToString;
        $scope.shippingPrice = 0;
        $scope.orderSubtotal;
        $scope.shippingMethods = scriptData.shippingMethods;
        $scope.shippingMethodPrices;

        $scope.getViewMode = function() {
            return window.location.hash.replace('#/', '').replace('#', '') || 'simple';
        };

        var ajaxCalculate;
        $scope.advanceGetCaculaltedShippingPrice = function() {
            if (ajaxCalculate) {
                ajaxCalculate.abort();
            }
            var data = {
                methods: {},
                location: $scope.province
            };
            for (var i in $scope.shippingMethods) {
                var method = $scope.shippingMethods[i];
                method.products = [];
                for (var j in $scope.cartProducts) {
                    var product = $scope.cartProducts[j];
                    if (product.shippingMethodIndex == i) {
                        method.products.push(product.id);
                    }
                }
                data.methods[method.codename] = method.products;
            }
            ajaxCalculate = $.ajax({
                type: 'post',
                url: scriptData.advanceCalculateShippingPriceService,
                data: data,
                success: function(resp) {
                    $scope.shippingMethodPrices = resp;
                    $scope.shippingPrice = 0;
                    for (var i in resp) {
                        $scope.shippingPrice += resp[i];
                    }
                    setTimeout(function() {
                        $scope.$apply();
                    });
                }
            });
        };


        $scope.setViewMode = function(mode) {
            window.location.hash = mode;
            $scope.hashChange();
        };

        $scope.calTotal = function() {
            return scriptData.priceNTax + $scope.shippingPrice;
        };

        $scope.setShipPrice = function(price) {
            $scope.shippingPrice = price;
        };

        $scope.getOrderTotal = function() {
            return parseFloat($scope.orderSubtotal) + parseFloat($scope.shippingPrice);
        };

        $scope.getSimpleShipData = function() {
            $scope.shippingPrice = 0;
            $http.get(scriptData.simpleShipURL + $scope.province).success(function(resp) {
                $scope.simpleShipData = resp;
                if ($scope.simpleShipData[0]) {
                    $scope.setShipPrice($scope.simpleShipData[0].price);
                }
                setTimeout(function() {
                    $scope.$apply();
                });
            });
        };

        $scope.selProvinceOnchange = function() {
            if ($scope.getViewMode() === 'simple') {
                $scope.getSimpleShipData();
            } else if ($scope.getViewMode() === 'advance') {
                for (var i in $scope.cartProducts) {
                    var product = $scope.cartProducts[i];
                    product.shippingMethodIndex = 0;
                }
            }
        };

        var watched = false;
        $scope.hashChange = function() {
            if ($scope.getViewMode() === 'simple') {
                $scope.getSimpleShipData();
            }//simple
            if ($scope.getViewMode() === 'advance') {
                $scope.shippingPrice = 0;
                $http.get(scriptData.cartServiceURL).success(function(resp) {
                    if (!resp.products) {
                        return;
                    }
                    for (var i in resp.products) {
                        var product = resp.products[i];
                        product.shippingMethodIndex = 0;
                    }
                    $scope.cartProducts = resp.products;
                    $scope.advanceGetCaculaltedShippingPrice();
                });
            }//advance
        };
        $scope.hashChange();
    };

})(window, scriptData, $);