angular.module('lynx').controller('CategoryListCtrl', ['$scope', '$http', '$timeout', function($scope, $http, $timeout) {
        $scope.productRows = [[]];
        $scope.sortOptions = scriptData.sortOptions;
        $scope.hashParams = {
            sort: $.hashParam('sort') || (scriptData.isCategoryContainer ? '' : 'new')
        };
        $scope.offset = 0;

        $scope.sortBy = function(mode) {
            $scope.hashParams.sort = mode;
        };

        $scope.$watchCollection('hashParams', function(newValue, oldValue) {
            if (newValue === oldValue)
                return;
            window.location.hash = $.param($scope.hashParams);
            $scope.offset = 0;
            getProducts();
        });

        var getParams;
        function getProducts() {
            var resetProducts = false;
            newParams = {
                offset: $scope.offset,
                sort: $scope.hashParams.sort
            };
            if (JSON.stringify(newParams) == JSON.stringify(getParams))
                return;

            if (getParams && newParams.sort !== getParams.sort) {
                resetProducts = true;
            }
            getParams = newParams;
            $http.get('/category/productService/' + scriptData.categoryId, {params: getParams}).success(function(products) {
                if (resetProducts)
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
        getProducts();
        $(window).scroll(function() { //detect page scroll
            if ($(window).scrollTop() + $(window).height() === $(document).height())  //user scrolled to bottom of the page?
            {
                getProducts();
            }
        });

    }]);