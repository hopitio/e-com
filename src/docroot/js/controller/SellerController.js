function SellerController($scope,$http)
{
    var $common = new Common();
    $scope.userId = $common.getParameterByName("user_id");
    $scope.sellerName = $common.getParameterByName("seller_name");
    
    $scope.filterOptions = {
            filterText: "",
            useExternalFilter: true
    }; 
    
    
    $scope.totalServerItems = 0;
    $scope.pagingOptions = {
        pageSizes: [10, 20, 30, 50, 100],
        pageSize: $common.getParameterByName("page_size") == "" ? 10 : $common.getParameterByName("page_size"),
        currentPage: $common.getParameterByName("page_number") == "" ? 1 : $common.getParameterByName("page_number"),
    };  
    $scope.gridOptions = {
            data: 'sellerData',
            rowHeight: 50,
            enablePaging: true,
            showFooter: true,
            totalServerItems: 'totalServerItems',
            pagingOptions: $scope.pagingOptions,
            filterOptions: $scope.filterOptions,
            multiSelect: false,
            columnDefs: [
                         {field: 'fk_manager',displayName: 'User Id',width:'50px'},
                         {field: 'logo',displayName: 'Logo',width:'50px', cellTemplate: 'cellImageTemplate.html'},
                         {field: 'name',displayName: 'Tên'},
                         {field: 'email',displayName: 'Email'},
                         {field: 'phoneno',displayName: 'Phoneno'},
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
        sellerFindServiceClient = new SellerServiceClient($http);
        sellerFindServiceClient.getSeller($scope.userId,$scope.sellerName,pageSize,page-1,
                getSellerSucessCallback,getSellerErrorCallback);
    };
    
    function getSellerSucessCallback(data){
        if(!data.isError){
            $scope.setPagingData(data.data['SELLER'], data.data['COUNT']);
        }
        
        $common.onLoaded();
    }
    
    function getSellerErrorCallback(xhr,status){}
    
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
    
    $scope.startup = function (){
        if($scope.userId == "" && $scope.sellerName == ""){
            return;
        }
        $scope.getPagedDataAsync($scope.pagingOptions.pageSize,$scope.pagingOptions.currentPage);
        $common.onLoading();
    };
    
    $scope.startup();
}
SellerController.$inject = ['$scope','$http'];