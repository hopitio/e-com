(function() {
    angular.module('lynx').controller('cartShippingCtrl', ['$scope', '$http', 'cartService', function($scope, $http, cartService) {
            $scope.selectedProvince = 101;
            $scope.provinces = script_data.provinces;
            $scope.mode = 'simple';
            $scope.fnMoneyToString = window.fnMoneyToString;
            $scope.products = [];
            $scope.countProducts = 0;
            $scope.totalRawPrice = 0;
            $scope.productTotalTaxes = 0;

            $scope.simpleData = {
                methods: [],
                selected_index: 0
            };
            $scope.advanceData = {
                methods: scriptData.shippingMethods
            };

            $scope.setMode = function(mode) {
                $scope.mode = mode;
                if (mode === 'simple') {
                    loadSimpleData();
                }
            };
            $scope.setMode('simple');

            $scope.getShipPrice = function() {
                if ($scope.mode === 'simple' && $scope.simpleData.methods[$scope.simpleData.selected_index])
                    return $scope.simpleData.methods[$scope.simpleData.selected_index].price;
                return 0;
            };

            function loadSimpleData() {
                $http.get('/cart/simpleShippingPriceService/' + $scope.selectedProvince).success(function(resp) {
                    $scope.simpleData.methods = resp;
                });
            }

            cartService.registerLoadProducts(function(products) {
                $scope.products = products;
                $scope.countProducts = cartService.countProducts();
                $scope.totalRawPrice = cartService.calculateTotalRawPrice();
                $scope.productTotalTaxes = cartService.calculateTotalTax();
            });
        }]);
})();