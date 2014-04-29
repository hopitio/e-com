
function PortalUserOrderHistoryController($scope,$modal,$http)
{
    $scope.onLoadOrder = false;
    $scope.template = "ModalOrderList.html";
    var modalInstance ;
    $scope.loadAllOrder = function(){
        userOrderHistoryServiceClient = new PortalUserOrderHistoryServiceClient($http);
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
    $scope.preStatusOrder = function(val){
       return val.replace("_", " ");
    }
    $scope.loadAllOrder();
    
    $scope.showOrderDetail = function(order)
    {
        $scope.template = "ModalOrderDetail.html";
        $scope.order = order;
    }
    $scope.backToList = function (){
        $scope.template = "ModalOrderList.html";
        $scope.order = undefined;
    }

}

PortalUserOrderHistoryController.$inject = ['$scope','$modal','$http'];