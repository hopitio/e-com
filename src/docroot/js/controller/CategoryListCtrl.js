angular.module('lynx').controller('CategoryListCtrl', ['$scope', '$http', '$timeout', function ($scope, $http, $timeout) {
        $scope.productRows = [[]];
        $scope.sortOptions = scriptData.sortOptions;
        $scope.advancedFilter = false;
        $scope.advancedParams = {
            priceLow: null,
            priceHigh: null
        };
        $scope.hashParams = {
            sort: $.hashParam('sort') || (scriptData.isCategoryContainer ? '' : 'new')
        };
        $scope.offset = 0;

        $scope.sortBy = function (mode) {
            $scope.hashParams.sort = mode;
        };

        $scope.$watchCollection('hashParams', function (newValue, oldValue) {
            if (newValue === oldValue)
                return;
            window.location.hash = $.param($scope.hashParams);
            $scope.offset = 0;
            getProducts();
        });

        function $apply(fn) {
            setTimeout(function () {
                $scope.$apply(function () {
                    fn();
                });
            });
        }

        var getParams;
        function getProducts(forceReset) {
            resetProduct = false;
            var newParams = {
                offset: forceReset ? 0 : $scope.offset,
                sort: $scope.hashParams.sort
            };
            if ($scope.advancedFilter)
                $.extend(newParams, $scope.advancedParams);
            if (JSON.stringify(newParams) == JSON.stringify(getParams))
                return;

            if (getParams && newParams.sort !== getParams.sort) {
                resetProduct = true;
            }

            getParams = newParams;
            $.ajax({
                cache: false,
                url: '/category/productService/' + scriptData.categoryId,
                data: getParams,
                dataType: 'json',
                success: function (products) {
                    $apply(function () {
                        if (resetProduct || forceReset)
                            $scope.productRows = [[]];
                        var currentRow = Math.max($scope.productRows.length - 1, 0);
                        $scope.offset += products.length;
                        //productRow
                        for (var i in products) {
                            var product = products[i];
                            if (!$scope.productRows[currentRow] || $scope.productRows[currentRow].length === 4) {
                                $scope.productRows.push([]);
                                currentRow++;
                            }
                            $scope.productRows[currentRow].push(product);
                        }
                    });
                }
            });
        }
        getProducts();
        $(window).scroll(function () { //detect page scroll
            if ($(window).scrollTop() + $(window).height() === $(document).height())  //user scrolled to bottom of the page?
            {
                getProducts();
            }
        });

        $scope.getProducts = getProducts;

        $scope.toggleFilter = function () {
            $scope.advancedFilter = !$scope.advancedFilter;
            if (!$scope.advancedFilter) {
                getProducts(true);
            }
        };
    }]);

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    }
    return true;
}