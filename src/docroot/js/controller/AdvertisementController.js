function AdvertisementController($scope, $http)
{
    for (x in scriptData) {
        $scope[x] = scriptData[x];
    }
    $scope.add_banner = function(type) {
        if (typeof ($scope.banner[type]) == 'undefined') {
            $scope.banner[type] = [];
            $scope['index_' + type] = 0;
            $scope['count_' + type] = 0;
        }
        $scope['index_' + type]++;
        $scope['count_' + type]++;
        $scope.banner[type].push($scope['index_' + type]);
    }
    $scope.remove_banner = function(type, index) {
        for (var i = 0; i < $scope.banner[type].length; i++) {
            if ($scope.banner[type][i] == index) {
                console.log(i);
                $scope.banner[type].splice(i, 1);
                $scope['count_' + type]--;
            }
        }
    }
    $scope.remove_old_banner = function(type, index) {
        $scope.old_banner[type].splice(index, 1);
    }
    $scope.banner = {};
//    for (var key in $scope.banner_types) {
//        $scope.add_banner($scope.banner_types[key]['type']);
//    }
}