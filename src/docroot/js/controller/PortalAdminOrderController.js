function PortalAdminOrderController($scope,$http, $modal)
{
    $scope.order = {};
    $scope.order.id = document.URL.split("/")[document.URL.split("/").length - 1];
    $scope.orderHistories = [];
    $scope.comment = '';
    this.modalInstance = '';
    $scope.getOrder = function(){
        portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
        portalAdminOrderServiceClient.getorder($scope.order.id, getOrderSucessCallback, getErrorCallback);
    };
    
    $scope.getHistories = function(){
        portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
        portalAdminOrderServiceClient.getStatusHistories($scope.order.id, getOrderHistorySucessCallback, getErrorCallback);
    };
    
    function getOrderSucessCallback(data){
        if(!data.isError){
            $scope.order = data.data;
        }
    }
    function getOrderHistorySucessCallback(data){
        if(!data.isError){
            $scope.orderHistories = data.data;
        }
    }
    
    function getErrorCallback(xhr,status){}
    
    function dialogCallback (dialogResult) {
        $scope.comment = dialogResult.comment;
        var statusType = dialogResult.statusType;
        portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
        switch(statusType){
            case 'nextStatus' :
                portalAdminOrderServiceClient.postNextOrderStatus($scope.order.id, $scope.comment, changStatusSucessCallback, changStatusErrorCallback);
                break;
            case 'backStatus' :
                portalAdminOrderServiceClient.postBackOrderStatus($scope.order.id, $scope.comment, changStatusSucessCallback, changStatusErrorCallback);
                break;
            case 'rejectStatus' :
                portalAdminOrderServiceClient.rejectOrderStatus($scope.order.id, $scope.comment, changStatusSucessCallback, changStatusErrorCallback);
                break;
        }
      }
   
    
    $scope.nextStatus = function(){
        this.modalInstance = $modal.open({
            templateUrl: 'commentDialog.html',
            controller: ModalInstanceCtrl,
            resolve: {
                statusType: function () {
                  return 'nextStatus';
                }
              }
        });
        this.modalInstance.result.then(dialogCallback, function () {});
    };
    
    $scope.backStatus = function(){
        this.modalInstance = $modal.open({
            templateUrl: 'commentDialog.html',
            controller: ModalInstanceCtrl,
            resolve: {
                statusType: function () {
                  return 'backStatus';
                }
              }
        });
        this.modalInstance.result.then(dialogCallback, function () {});
    };
    
    $scope.rejectStatus = function(){
        this.modalInstance = $modal.open({
            templateUrl: 'commentDialog.html',
            controller: ModalInstanceCtrl,
            resolve: {
                statusType: function () {
                  return 'rejectStatus';
                }
              }
        });
        this.modalInstance.result.then(dialogCallback, function () {});
    };
    
    function changStatusSucessCallback(data){
        if(!data.isError){
            alert(data.data);
            location.reload();
        }else{
            alert(data.errorMessage);
        }
    }
    
    function changStatusErrorCallback(xhr,status){
        
    }
    
    $scope.getOrder();
    $scope.getHistories();
}

function ModalInstanceCtrl($scope, $modalInstance, statusType) {
    $scope.dialog = {};
    $scope.dialog.comment = '';
    $scope.dialog.statusType = statusType;
    $scope.ok = function () {
      $modalInstance.close($scope.dialog);
    };
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}
  PortalAdminOrderController.$inject = ['$scope','$http','$modal'];
  ModalInstanceCtrl.$inject = ['$scope','$modalInstance','statusType'];
