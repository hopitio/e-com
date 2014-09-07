
function PortalUserOrderHistoryController($scope,$http)
{
    $scope.onLoadOrder = false;
    $scope.Common = new Common();
    $scope.template = "ModalOrderList.html";
    $scope.comment = '';
    $scope.cancelOrder = {};
    var modalInstance ;
    $scope.loadAllOrder = function(){
        userOrderHistoryServiceClient = new PortalUserOrderHistoryServiceClient($http);
        userOrderHistoryServiceClient.getAllOrderHistory('all', getAllOrderHistorySucessCallback, getAllOrderHistoryErrorCallback);
        $scope.onLoadOrder = true;
    };
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
    };
    $scope.preStatusOrder = function(val){
       return val.replace("_", " ");
    };
    
    
    $scope.showOrderDetail = function(order)
    {
        $scope.template = "ModalOrderDetail.html";
        $scope.order = order;
    };
    $scope.backToList = function (){
        $scope.template = "ModalOrderList.html";
        $scope.order = undefined;
    };
    
    $scope.cancelOrder = function(order){
        $("#comment-modal").modal('show');
        $scope.cancelOrder = order;
    };
    
    $scope.cancelOrderPost = function(){
        $scope.Common.onLoading();
        $("#comment-modal").modal('hide');
        userOrderHistoryServiceClient = new PortalUserOrderHistoryServiceClient($http);
        userOrderHistoryServiceClient.cancelOrder(JSON.stringify($scope.cancelOrder), $scope.comment, onCancelOrderSucessCallback, getAllOrderHistoryErrorCallback);
    };
    
    
    $scope.returnOrder = function(order){
        window.location = order.returnUrl;
    };
    
    function onCancelOrderSucessCallback(reuslt){
        if(!reuslt.isError){
            $scope.Common.onLoaded();
            alert(reuslt.data.message);
            location.reload();
        }
    }
    
    $scope.loadAllOrder();

}

function ModalInstanceCtrl($scope, $modalInstance, order) {
    $scope.dialog = {};
    $scope.dialog.comment = '';
    $scope.dialog.order = order;
    $scope.ok = function () {
      $modalInstance.close($scope.dialog);
    };
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}

PortalUserOrderHistoryController.$inject = ['$scope','$http'];

