
function UserOrderHistoryController($scope,$http)
{
    $scope.onLoadOrder = false;
    $scope.loadAllOrder = function(){
        userOrderHistoryServiceClient = new UserOrderHistoryServiceClient($http);
        userOrderHistoryServiceClient.getAllOrderHistory('all', getAllOrderHistorySucessCallback, getAllOrderHistoryErrorCallback);
        $scope.onLoadOrder = true;
    }
    function getAllOrderHistorySucessCallback(result){
        $scope.onLoadOrder = false;
        if(result.isError){
            
        }else{
            $scope.orders = result.data;
        }
    }
        
    function getAllOrderHistoryErrorCallback(xhr,state)
    {
        $scope.onLoadOrder = false;
    }
    $scope.parseInt = function(val){
        return parseInt(val);
    }
    $scope.loadAllOrder();
}
UserOrderHistoryController.$inject = ['$scope','$http'];