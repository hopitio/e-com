function BestController($scope, $http)
{
    $scope.product = [];
    for (x in scriptData) {
        $scope[x] = scriptData[x];
    }

    $scope.add_product = function(id) {
        if (typeof ($scope.product[id]) == 'undefined') {
            $scope.product[id] = [];
        }
        $scope.product[id].push('');
    }

    $scope.remove_product = function(id, index) {
        $scope.product[id].splice(index, 1);
    }

}