angular.module('lynx').controller('homeCtrl', ['$scope', '$http', '$timeout', function($scope, $http, $timeout) {
        $scope.hotProducts = [];
        $scope.activeHot = 0;
        $scope.featureGroups = [];
        $scope.selectedGroupIndex = 0;
        $scope.newProducts = [];
        $scope.ajaxNew;
        $scope.newProductOffset = 0;

        $scope.setSelectedGroup = function(index) {
            $scope.selectedGroupIndex = index;
        };

        $scope.getMoreNewProduct = function() {
            var page = $scope.newProducts.length / 2 + 1;
            if ($scope.ajaxNew)
                return;
            $scope.ajaxNew = $.ajax({
                url: '/home/new_service/' + $scope.newProductOffset,
                success: function(resp) {
                    if (!resp[0] || !resp[0].id)
                        $scope.getMoreNewProduct = function() {
                        };
                    for (var i in resp) {
                        var product = resp[i];
                        var currentRow = $scope.newProducts.length - 1;
                        if (!$scope.newProducts[currentRow] || $scope.newProducts[currentRow].length == 4) {
                            $scope.newProducts.push([]);
                            currentRow++;
                        }
                        $scope.newProducts[currentRow].push(product);
                    }
                    $scope.newProductOffset += resp.length;
                    $scope.ajaxNew = null;
                    setTimeout(function() {
                        $scope.$apply();
                    });
                }
            });
        };
        $scope.getMoreNewProduct();

        $http.get('/home/hot_service').success(function(resp) {
            if (resp[0] && resp[0].id) {
                for (var i in resp) {
                    var product = resp[i];
                    var page = Math.floor(parseInt(i) / 5);
                    if (!$scope.hotProducts[page])
                        $scope.hotProducts.push([]);
                    $scope.hotProducts[page].push(product);
                }
            }
        });

        $http.get('/home/feature_group_service').success(function(resp) {
            if (!resp[0] || !resp[0].id)
                return;
            $scope.featureGroups = resp;
        });
    }]);

$(document).ready(function() {
    $(".carousel ").swiperight(function() {
        $(this).carousel('prev');
    });
    $(".carousel ").swipeleft(function() {
        $(this).carousel('next');
    });
});  