var config = new Config;

angular.module('lynx').factory('cartService', ['$http', function ($http) {
        var products = [];
        var callbacks = [];

        function loadProducts() {
            $http.get('/cart/cartProductsService').success(function (resp) {
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
            calculateTotalRawPrice: calculateTotalRawPrice
        };
    }]);

angular.module('lynx').controller('LayoutCtrl', ['$scope', '$http', 'cartService', function ($scope, $http, cartService) {
        $scope.widgetRightActive = 'viewed';
        $scope.widgetRightPage = 1;
        $scope.widgetRightProducts = {
            'cart': [[]],
            'viewed': [[]]
        };

        $scope.setWidgetRightActive = function (name) {
            $scope.widgetRightActive = name;
        };

        $scope.getCurrentProducts = function () {
            if (!$scope.widgetRightProducts[$scope.widgetRightActive])
                return;
            if (!$scope.widgetRightProducts[$scope.widgetRightActive][$scope.widgetRightPage - 1])
                return;
            return $scope.widgetRightProducts[$scope.widgetRightActive][$scope.widgetRightPage - 1];
        };

        $scope.changeWidgetPage = function (direction) {
            if (direction > 0 && $scope.widgetRightPage < $scope.widgetRightProducts[$scope.widgetRightActive].length)
                $scope.widgetRightPage += 1;
            else if (direction < 0 && $scope.widgetRightPage > 1)
                $scope.widgetRightPage -= 1;
        };

        $scope.countCartProducts = cartService.countProducts;

        $scope.countWidgetProducts = function (type) {
            var pages = $scope.widgetRightProducts[type];
            var count = 0;
            for (var i in pages) {
                count += pages[i].length;
            }
            return count;
        };

        $scope.getViewed = function () {
            $scope.widgetRightProducts.viewed = [[]];
            $http.get('/home/viewed_service').success(function (resp) {
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

        cartService.registerLoadProducts(function (products) {
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

        $scope.removeFromCart = function (productID) {
            cartService.removeProduct(productID);
        };

        $scope.removeFromHistory = function (productID) {
            $.ajax({
                cache: false,
                url: '/home/remove_from_history/' + productID,
                success: function () {
                    setTimeout(function () {
                        $scope.$apply(function () {
                            removeProductFromWidget('viewed', productID);
                        });
                    });
                }
            });
        };

        function removeProductFromWidget(listName, productID) {
            var list = $scope.widgetRightProducts[listName];
            var last_product;
            outer_loop:
                    for (var i = list.length - 1; i >= 0; i--) {
                var page = $scope.widgetRightProducts.viewed[i];
                if (last_product) {
                    page.push(last_product);
                    last_product = null;
                }
                for (var j in page) {

                    var product = page[j];
                    if (product.id == productID) {
                        page.splice(j, 1);
                        break outer_loop;
                    }
                }
                last_product = page.splice(0, 1)[0];
            }
        }
    }]);

$(function () {
    $('#scroll-to-top').click(function () {
        $('body').animate({'scrollTop': 0});
    });
    $('#scroll-to-bottom').click(function () {
        $('body').animate({'scrollTop': $('body').height()});
    });

    var widgetRight = $('#widget-right');
    var widgetLeft = $('#widget-left');

    if (widgetRight.length) {
        widgetRight.data().top = widgetRight.offset().top;
        $(document).scroll(function () {
            if (!widgetRight.is(':visible'))
            {
                return;
            }
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
    }
    if (widgetLeft.length) {
        widgetLeft.data().top = widgetLeft.offset().top;
        $(document).scroll(function () {
            if (!widgetLeft.is(':visible'))
            {
                return;
            }
            if ($(this).scrollTop() >= widgetLeft.data().top - 10) {
                if (!widgetLeft.data().cls)
                    widgetLeft.addClass('fixed-top');
                widgetLeft.data().cls = true;
            } else {
                if (widgetLeft.data().cls)
                    widgetLeft.removeClass('fixed-top');
                widgetLeft.data().cls = false;
            }
        });
    }
});
$(function () {
    var $frm = $('#frm-search');
    $('#btn-search').click(function () {
        $frm.submit();
    });
});