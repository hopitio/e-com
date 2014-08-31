var config = new Config;

angular.module('lynx').factory('cartService', ['$http', function($http) {
        var products = [];
        var callbacks = [];

        function loadProducts() {
            $http.get('/cart/cartProductsService').success(function(resp) {
                products = resp.products;
                for (var i in callbacks)
                    callbacks[i](products);
            });
        }
        loadProducts();

        function getProducts() {
            return products;
        }

        function registerLoadProducts(callback) {
            callbacks.push(callback);
            if (products.length) {
                callback(products);
            }
        }

        function countProducts() {
            var ret = 0;
            for (var i in products) {
                ret += parseFloat(products[i].quantity);
            }
            return ret;
        }

        function calculateTotalRawPrice() {
            var ret = 0;
            for (var i in products) {
                var product = products[i];
                ret += product.price * product.quantity;
            }
            return ret;
        }

        function calculateTotalTax() {
            var ret = 0;
            for (var i in products) {
                var product = products[i];
                ret += product.taxes * product.quantity;
            }
            return ret;
        }

        function removeProduct(id) {
            for (var i in products) {
                if (products[i].id == id)
                    products.splice(i, 1);
            }
            for (var i in callbacks)
                callbacks[i](products);
            $.ajax({
                url: '/cart/removeFromCart/' + id
            });
        }

        return {
            loadProducts: loadProducts,
            getProducts: getProducts,
            registerLoadProducts: registerLoadProducts,
            removeProduct: removeProduct,
            countProducts: countProducts,
            calculateTotalRawPrice: calculateTotalRawPrice,
            calculateTotalTax: calculateTotalTax
        };
    }]);

angular.module('lynx').controller('LayoutCtrl', ['$scope', '$http', 'cartService', function($scope, $http, cartService) {
        $scope.widgetRightActive = 'viewed';
        $scope.widgetRightPage = 1;
        $scope.widgetRightProducts = {
            'cart': [[]],
            'viewed': [[]]
        };

        $scope.setWidgetRightActive = function(name) {
            $scope.widgetRightActive = name;
        };

        $scope.getCurrentProducts = function() {
            if (!$scope.widgetRightProducts[$scope.widgetRightActive])
                return;
            if (!$scope.widgetRightProducts[$scope.widgetRightActive][$scope.widgetRightPage - 1])
                return;
            return $scope.widgetRightProducts[$scope.widgetRightActive][$scope.widgetRightPage - 1];
        };

        $scope.changeWidgetPage = function(direction) {
            if (direction > 0 && $scope.widgetRightPage < $scope.widgetRightProducts[$scope.widgetRightActive].length)
                $scope.widgetRightPage += 1;
            else if (direction < 0 && $scope.widgetRightPage > 1)
                $scope.widgetRightPage -= 1;
        };

        $scope.countCartProducts = cartService.countProducts;

        $scope.countWidgetProducts = function(type) {
            var pages = $scope.widgetRightProducts[type];
            var count = 0;
            for (var i in pages) {
                count += pages[i].length;
            }
            return count;
        };

        $scope.getViewed = function() {
            $scope.widgetRightProducts.viewed = [[]];
            $http.get('/home/viewed_service').success(function(resp) {
                if (!resp[0] || !resp[0].id)
                    return;
                var currentRow = 0;
                for (var i in resp) {
                    var product = resp[i];
                    if ($scope.widgetRightProducts.viewed[currentRow].length === 3) {
                        $scope.widgetRightProducts.viewed.push([]);
                        currentRow++;
                    }
                    $scope.widgetRightProducts.viewed[currentRow].push(product);
                }
            });
        };
        $scope.getViewed();

        cartService.registerLoadProducts(function(products) {
            $scope.widgetRightProducts.cart = [[]];
            var currentRow = 0;
            for (var i in products) {
                var product = products[i];
                if ($scope.widgetRightProducts.cart[currentRow].length === 3) {
                    $scope.widgetRightProducts.cart.push([]);
                    currentRow++;
                }
                $scope.widgetRightProducts.cart[currentRow].push(product);
            }

        });

        $scope.changeLanguage = function(languageKey) {
            commonServiceClient = new CommonServiceClient($http);
            commonServiceClient.updateLanguage(languageKey, updateLanguageSucessCallback, updateLanguageErrorCallback);
        };

        function updateLanguageSucessCallback(result)
        {
            if (result.isError) {

            } else {
                location.reload();
            }
        }

        function updateLanguageErrorCallback(xhr, status) {

        }

    }]);

$(function() {
    $('#scroll-to-top').click(function() {
        $('body').animate({'scrollTop': 0});
    });
    $('#scroll-to-bottom').click(function() {
        $('body').animate({'scrollTop': $('body').height()});
    });

    var widgetRight = $('#widget-right');
    widgetRight.data().top = widgetRight.offset().top;
    $(document).scroll(function() {
        if ($(this).scrollTop() >= widgetRight.data().top - 10) {
            if (!widgetRight.data().cls)
                widgetRight.addClass('fixed-top');
            widgetRight.data().cls = true;
        } else {
            if (widgetRight.data().cls)
                widgetRight.removeClass('fixed-top');
            widgetRight.data().cls = false;
        }
    });
});
