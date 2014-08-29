function HotController($scope, $http)
{
    $scope.product = [];
    for (x in scriptData) {
        $scope[x] = scriptData[x];
    }

    $scope.add_product = function(type) {
        if (typeof ($scope.product[type]) == 'undefined') {
            $scope.product[type] = [];
        }
        $scope.product[type].push('');
    }

    $scope.remove_product = function(type, index) {
        $scope.product[type].splice(index, 1);
    }

}