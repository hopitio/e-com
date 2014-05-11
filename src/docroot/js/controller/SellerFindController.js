function SellerFindController($scope,$http)
{
    $scope.userId = '';
    $scope.sellerName = '';
    $scope.filterOptions = {
            filterText: "",
            useExternalFilter: true
    }; 
    $scope.totalServerItems = 0;
    $scope.pagingOptions = {
        pageSizes: [10, 20, 30, 50, 100],
        pageSize: 10,
        currentPage: 1,
    };  
    $scope.gridOptions = {
            data: 'sellerData',
            enablePaging: true,
            showFooter: true,
            totalServerItems: 'totalServerItems',
            pagingOptions: $scope.pagingOptions,
            filterOptions: $scope.filterOptions,
            multiSelect: false,
            columnDefs: [
                         {field: 'name',displayName: 'Tên'},
                         {field: 'logo',displayName: 'Logo', cellTemplate: 'cellImageTemplate.html'},
                         {field: 'email',displayName: 'Email'},
                         {field: 'phoneno',displayName: 'Phoneno'},
                         {field: 'fk_manager',displayName: 'User Id'},
                         {field: 'id',displayName: '',cellTemplate: 'cellIdTemplate.html'},
                         ]
        };

    
    $scope.setPagingData = function(data, total){  
        $scope.sellerData = data;
        $scope.totalServerItems = total;
        if (!$scope.$$phase) {
            $scope.$apply();
        }
    };
    
    $scope.getPagedDataAsync = function (pageSize, page) {
        sellerFindServiceClient = new SellerFindServiceClient($http);
        sellerFindServiceClient.getSeller($scope.userId,$scope.sellerName,pageSize,page-1,
                getSellerSucessCallback,getSellerErrorCallback);
    };
    
    $scope.find = function(){
        sellerFindServiceClient = new SellerFindServiceClient($http);
        sellerFindServiceClient.getSeller($scope.userId,$scope.sellerName,pageSize,0,
                getSellerSucessCallback,getSellerErrorCallback);
    }
    
    function getSellerSucessCallback(data){
        if(!data.isError){
            $scope.setPagingData(data.data['SELLER'], data.data['COUNT']);
        }
    }
    
    function getSellerErrorCallback(xhr,status){
        
    }
    
    $scope.$watch('pagingOptions', function (newVal, oldVal) {
        if (newVal !== oldVal && newVal.currentPage !== oldVal.currentPage) {
          $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage, $scope.filterOptions.filterText);
        }
    }, true);
    $scope.$watch('filterOptions', function (newVal, oldVal) {
        if (newVal !== oldVal) {
          $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage, $scope.filterOptions.filterText);
        }
    }, true);
    
    
}
SellerFindController.$inject = ['$scope','$http'];