function PortalAdminOrderController($scope,$http)
{
    $scope.order = {};
    $scope.order.id = document.URL.split("/")[document.URL.split("/").length - 1];
    $scope.orderHistories = [];
    $scope.comment = '';
        
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
    
    $scope.nextStatus = function(){
        portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
        portalAdminOrderServiceClient.postNextOrderStatus($scope.order.id, $scope.comment, changStatusSucessCallback, changStatusErrorCallback);
    };
    
    $scope.backStatus = function(){
        portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
        portalAdminOrderServiceClient.postBackOrderStatus($scope.order.id, $scope.comment, changStatusSucessCallback, changStatusErrorCallback);
    };
    
    $scope.rejectStatus = function(){
        portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
        portalAdminOrderServiceClient.rejectOrderStatus($scope.order.id, $scope.comment, changStatusSucessCallback, changStatusErrorCallback);
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
PortalAdminOrderController.$inject = ['$scope','$http'];