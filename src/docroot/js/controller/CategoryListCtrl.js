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

$(function () {
    $('#txt_price_low, #txt_price_high').change(function (evt) {
        var val = $(this).val();
        $(this).val(val.toString().replace(/,/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }).blur(function (evt) {
        var val = $(this).val();
        $(this).val(val.toString().replace(/,/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }).keypress(function (evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        if ((key < 48 || key > 57) && !(key == 8 || key == 9 || key == 13 || key == 37 || key == 39)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault)
                theEvent.preventDefault();
        }
    }).focus(function () {
        $(this).val($(this).val().replace(/,/g, ''));
    }).trigger('change');
});