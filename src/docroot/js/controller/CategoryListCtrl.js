angular.module('lynx').controller('CategoryListCtrl', ['$scope', '$http', '$timeout', function($scope, $http, $timeout) {
        $scope.productRows = [[]];
        $scope.hashParams = {
            p: parseInt($.hashParam('p')) || 1
        };
        $scope.pageNavs = [];

        $scope.changePage = function(a) {
            $scope.hashParams.p = a;
        };

        $scope.$watchCollection('hashParams', function(newValue, oldValue) {
            if (newValue === oldValue)
                return;
            window.location.hash = $.param($scope.hashParams);
            getProducts();
        });

        var getParams;
        function getProducts() {
            newParams = {
                page: $scope.hashParams.p || 1
            };
            if (newParams === getParams)
                return;
            getParams = newParams;
            $http.get('/category/productService/' + scriptData.categoryId, {params: getParams}).success(function(resp) {
                $scope.productRows = [[]];
                var currentRow = 0;
                $scope.hashParams.p = Math.min(resp.totalPage, $scope.hashParams.p);
                //productRow
                for (var i in resp.products) {
                    var product = resp.products[i];
                    if (!$scope.productRows[currentRow] || $scope.productRows[currentRow].length === 4) {
                        $scope.productRows.push([]);
                        currentRow++;
                    }
                    $scope.productRows[currentRow].push(product);
                }
                //pageNav
                $scope.pageNavs = [];
                var minNav = Math.max(1, $scope.hashParams.p - 2);
                var maxNav = Math.min(resp.totalPage, $scope.hashParams.p + 2);
                if (maxNav - minNav < 4 && minNav === 1)
                    maxNav = Math.min(resp.totalPage, minNav + 4);
                else if ((maxNav - minNav < 4 && maxNav === resp.totalPage))
                    minNav = Math.max(0, maxNav - 4);
                for (var i = minNav; i > 0 && i <= maxNav; i++)
                    $scope.pageNavs.push(i);
                $timeout(function(){
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                });
            });
        }
        getProducts();

    }]);