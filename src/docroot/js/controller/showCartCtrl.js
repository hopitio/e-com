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
    $scope.undo;
    $scope.qtyRange = new Array(31);
    $scope.fnMoneyToString = scriptData.fnMoneyToString;
    $scope.wishlist = [];
    $scope.canCheckout = false;
    $scope.notifications = [];

    $scope.getProducts = function(successCallback) {
        $http.get(scriptData.serviceURL, {cache: false}).success(function(data) {
            $scope.products = data.products;
            $scope.notifications = data.notifications;
            if (successCallback) {
                successCallback(data);
            }
            var countProductValid = 0;
            $scope.canCheckout = false;
            for (var i in $scope.products) {
                var product = $scope.products[i];
                if (product.quantity && product.stock >= product.quantity) {
                    countProductValid++;
                }
            }
            if (countProductValid == $scope.products.length && $scope.products.length) {
                $scope.canCheckout = true;
            }
        }).error(function() {
//TODO
        });
    };
    $scope.getProducts();

    if (scriptData.wishlistServiceURL) {
        $scope.getWishlist = function() {
            $http.get(scriptData.wishlistServiceURL, {cache: false}).success(function(data) {
                $scope.wishlist = data;
            }).error(function() {
                //TODO
            });
        };
        $scope.getWishlist();
    }

    $scope.addToCart = function(wishlistDetailID) {
        $.ajax({
            cache: false,
            url: scriptData.addToCartURL + wishlistDetailID,
            success: function() {
                $scope.getWishlist();
                $scope.getProducts();
                refreshCart();
            }
        });
    };

    $scope.moveToWishlist = function(productID) {
        $.ajax({
            cache: false,
            url: scriptData.moveToWishlistURL + productID,
            success: function() {
                $scope.getWishlist();
                $scope.getProducts();
                refreshCart();
            }
        });
    };

    $scope.removeFromWishlist = function(wishlistDetailID) {
        $.ajax({
            cache: false,
            url: scriptData.removeFromWishlistURL + wishlistDetailID,
            success: function() {
                $scope.getWishlist();
            }
        });
    };

    $scope.calPriceOnly = function() {
        var total = 0;
        for (var i in $scope.products) {
            var product = $scope.products[i];
            total += product.price * product.quantity;
        }
        return total;
    };

    $scope.calTaxes = function() {
        var total = 0;
        for (var i in $scope.products) {
            var product = $scope.products[i];
            total += product.taxes * product.quantity;
        }
        return total;
    };

    $scope.checkout = function() {
        window.location = scriptData.checkoutURL;
    };

    $scope.updateQty = function(product) {
        var postData = {'products': {}};
        postData.products[product.id] = product.quantity;
        $.ajax({
            type: 'post',
            url: scriptData.updateQuantityURL,
            data: postData,
            success: function() {
                refreshCart();
            }, error: function() {
                //todo
            }
        });
    };

    $scope.removeFromCart = function(productID) {
        $http.get(scriptData.removeFromCartURL + productID, {cache: false}).success(function() {
            $scope.undo = productID;
            for (var i in $scope.products) {
                var product = $scope.products[i];
                if (product.id == $scope.undo) {
                    $scope.products.splice(i, 1);
//                            setTimeout(function() {
//                                $scope.$apply();
//                            });
                    break;
                }
            }
            refreshCart();
        }).error(function() {
            //TODO
        });
    };
    $scope.undoRemove = function() {
        $http.get(scriptData.addToCartURL + $scope.undo, {cache: false}).success(function() {
            $scope.undo = null;
            $scope.getProducts();
        }).error(function() {
            //TODO
        });
    };
}//controller
