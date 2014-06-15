
function PortalUserOrderHistoryController($scope,$modal,$http)
{
    $scope.onLoadOrder = false;
    $scope.template = "ModalOrderList.html";
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
    $scope.loadAllOrder();
    
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
        this.modalInstance = $modal.open({
            templateUrl: 'commentDialog.html',
            controller: ModalInstanceCtrl,
            resolve: {
                order: function () {
                  return order;
                }
              }
        });
        this.modalInstance.result.then(dialogCallback, function () {});
    };
    $scope.returnOrder = function(order){
        window.location = order.returnUrl;
    };
    
    function dialogCallback (dialogResult) {
        $scope.comment = dialogResult.comment;
        AppCommon.onLoading();
        userOrderHistoryServiceClient = new PortalUserOrderHistoryServiceClient($http);
        userOrderHistoryServiceClient.cancelOrder(JSON.stringify(dialogResult.order), $scope.comment, onCancelOrderSucessCallback, getAllOrderHistoryErrorCallback);
    }
    function onCancelOrderSucessCallback(reuslt){
        if(!reuslt.isError){
            AppCommon.onLoaded();
            alert(reuslt.data.message);
            $scope.loadAllOrder();
        }
    }

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

PortalUserOrderHistoryController.$inject = ['$scope','$modal','$http'];

