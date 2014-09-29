(function () {
    angular.module('lynx').controller('cartShippingCtrl', ['$scope', '$http', 'cartService', function ($scope, $http, cartService) {
            $scope.selectedProvince = 101;
            $scope.regions = script_data.regions;
            $scope.mode = 'simple';
            $scope.fnMoneyToString = window.fnMoneyToString;
            $scope.products = [];
            $scope.countProducts = 0;
            $scope.totalRawPrice = 0;
            $scope.productTotalTaxes = 0;

            $scope.simpleData = {
                methods: [],
                selected_index: 'standard'
            };
            $scope.advanceData = {
                methods: script_data.shippingMethods,
                calculatedPrices: []
            };

            $scope.getMethodDesc = function (methodCode) {
                for (var i in script_data.shippingMethods) {
                    if (script_data.shippingMethods[i].codename === methodCode)
                        return script_data.shippingMethods[i].label;
                }
            };

            $scope.setMode = function (mode) {
                $scope.mode = mode;
            };
            $scope.setMode('simple');

            $scope.$watch('mode + selectedProvince', function (new_val, old_val) {
                if ($scope.mode === 'simple') {
                    loadSimpleData();
                } else if ($scope.mode === 'advance') {
                    loadAdvanceData();
                }
            });

            $scope.$watch('selectedProvince', function (new_val, old_val) {
                if (new_val === old_val)
                    return;
                if ($scope.products && new_val != 101 && $scope.mode == 'advance')
                {
                    for (var i in $scope.products) {
                        var product = $scope.products[i];
                        if (product.shipping == 2) {
                            product.shipping = 0;
                        }
                    }
                    loadAdvanceData();
                }
                if ($scope.mode == 'simple' && $scope.simpleData.selected_index == 'premium' && $scope.selectedProvince != 101) {
                    $scope.simpleData.selected_index = 'standard';
                }
            });

            $scope.getShipPrice = function () {

                if ($scope.mode === 'simple' && $scope.simpleData.selected_index) {
                    for (var i in $scope.simpleData.methods) {
                        var method = $scope.simpleData.methods[i];
                        if (method.code == $scope.simpleData.selected_index)
                            return method.price;
                    }
                } else {
                    var ret = 0;
                    for (var i in $scope.advanceData.calculatedPrices) {
                        ret += $scope.advanceData.calculatedPrices[i].price;
                    }
                    return ret;
                }
                return 0;
            };

            var ajaxTimeout;
            var ajaxReq;

            function loadSimpleData() {
                $http.get('/cart/simpleShippingPriceService/' + $scope.selectedProvince).success(function (resp) {
                    $scope.simpleData.methods = resp;
                });
            }

            $scope.loadAdvanceData = loadAdvanceData;

            function loadAdvanceData() {
                if (!$scope.products.length) {
                    return;
                }
                var productMethods = {};
                for (var i in $scope.products) {
                    var product = $scope.products[i];
                    var method = script_data.shippingMethods[product.shipping];
                    if (!productMethods[method.codename])
                        productMethods[method.codename] = [];
                    productMethods[method.codename].push(product.id);
                }
                if (ajaxReq) {
                    ajaxReq.abort();
                }
                ajaxReq = $.ajax({
                    url: '/cart/advanceShippingPriceService',
                    type: 'post',
                    data: {
                        location: $scope.selectedProvince,
                        methods: productMethods
                    },
                    dataType: 'json',
                    success: function (resp) {
                        setTimeout(function () {
                            $scope.$apply(function () {
                                $scope.advanceData.calculatedPrices = resp;
                            });
                        });
                        ajaxReq = null;
                    }
                });
            }

            cartService.registerLoadProducts(function (products) {
                for (var i in products) {
                    $scope.products.push($.extend(products[i], {shipping: 0}));
                }
                $scope.countProducts = cartService.countProducts();
                $scope.totalRawPrice = cartService.calculateTotalRawPrice();
                $scope.productTotalTaxes = cartService.calculateTotalTax();
            });
        }]);
})();

$('#frmMain [data-type=submit]').click(function () {
    $('#frmMain').submit();
});