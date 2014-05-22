function PortalAdminOrderListController($scope,$http)
{
    
    $scope.orderId = ""; 
    $scope.account = "";
    $scope.createDate = "";
    $scope.alerts = [];
    $scope.orders = [];
    $scope.totalServerItems = 0;
    
    $scope.pagingOptions = {
        pageSizes: [10, 20, 30, 50, 100],
        pageSize: 10,
        currentPage: 1,
    };  
    
    $scope.gridOptions = {
            data: 'orders',
            enablePaging: true,
            showFooter: true,
            totalServerItems: 'totalServerItems',
            pagingOptions: $scope.pagingOptions,
            multiSelect: false
        };

    
    $scope.setPagingData = function(data, total){  
        $scope.orders = data;
        $scope.totalServerItems = total;
        if (!$scope.$$phase) {
            $scope.$apply();
        }
    };
    
    $scope.getPagedDataAsync = function (pageSize, page) {
        portalAdminOrderListServiceClient = new PortalAdminOrderListServiceClient($http);
        portalAdminOrderListServiceClient.findOrder($scope.account,$scope.orderId,$scope.createdDate, 
                        pageSize, pageSize * (page - 1), 
                        getOrderSucessCallback, getOrderErrorCallback);
    };
    
    $scope.find = function(){
        portalAdminOrderListServiceClient = new PortalAdminOrderListServiceClient($http);
        portalAdminOrderListServiceClient.findOrder($scope.account,$scope.orderId,$scope.createdDate, 
                        $scope.pagingOptions.pageSize, 0,
                        getOrderSucessCallback, getOrderErrorCallback);
    };
    
    function getOrderSucessCallback(data){
        if(!data.isError){
            $scope.setPagingData(data.data['result'], data.data['count']);
        }
    }
    
    function getOrderErrorCallback(xhr,status){
        
    }
    
    $scope.$watch('pagingOptions', function (newVal, oldVal) {
        if (newVal !== oldVal) {
          $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage);
        }
    }, true);
    
}
PortalAdminOrderListController.$inject = ['$scope','$http'];