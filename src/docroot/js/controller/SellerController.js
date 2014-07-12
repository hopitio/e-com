function SellerController($scope,$http)
{
    
    $scope.selectedSearchAccount = undefined;
    $scope.searchAccountResult = [];
    $scope.loadingSearchAccount = false;
    $scope.searchAccountAsyncCall = function(val){
        var sellerServiceClient = new SellerServiceClient($http);
        return sellerServiceClient.getFindingAccountThenCallback(val, searchAccountAsyncCallSucessCallback);
    };
    
    function searchAccountAsyncCallSucessCallback(data){
        if(!data.isError){
            $scope.searchAccountResult = data.data.data;
            return $scope.searchAccountResult;
        }
    };
    
    
    var $common = new Common();
    $scope.userId = $common.getParameterByName("user_id");
    $scope.sellerName = $common.getParameterByName("seller_name");

    $scope.totalServerItems = 0;
    $scope.sellers = [];
    $scope.pagingOptions = {
        pageSize: $common.getParameterByName("page_size") == "" ? 10 : $common.getParameterByName("page_size"),
        currentPage: $common.getParameterByName("page_number") == "" ? 1 : $common.getParameterByName("page_number"),
    };  
    
    $scope.getPagedDataAsync = function (pageSize, page) {
        sellerFindServiceClient = new SellerServiceClient($http);
        sellerFindServiceClient.getSeller($scope.userId,$scope.sellerName,pageSize,page-1,
                getSellerSucessCallback,getSellerErrorCallback);
    };
     
    function getSellerSucessCallback(data){
        if(!data.isError){
            $scope.sellers = data.data['SELLER'];
            $scope.totalServerItems = data.data['COUNT'];
        }
        $common.onLoaded();
    }
    
    function getSellerErrorCallback(xhr,status){}
    
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