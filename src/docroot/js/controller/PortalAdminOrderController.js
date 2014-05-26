function PortalAdminOrderController($scope,$http)
{
    $scope.order = {};
    $scope.order.id = document.URL.split("/")[document.URL.split("/").length - 1];
    
    $scope.getOrder = function(){
        portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
        portalAdminOrderServiceClient.getorder($scope.order.id, getOrderSucessCallback, getErrorCallback);
    };
    
    function getOrderSucessCallback(data){
        if(!data.isError){
            $scope.order = data.data;
        }else{
            
        }
        
    }
    
    function getErrorCallback(xhr,status){
        
    }
    
    $scope.getOrder();
}
PortalAdminOrderController.$inject = ['$scope','$http'];