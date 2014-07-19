function SellerController($scope,$http)
{
    var $common = new Common();
    $scope.currentPage = encodeURIComponent(window.location.href);
    $scope.logo = "";
    $scope.userId = $common.getParameterByName("user_id");
    $scope.sellerName = $common.getParameterByName("seller_name");
    $scope.pageSize = $common.getParameterByName("page_size");
    $scope.pageNumber = $common.getParameterByName("page_number");
    $scope.selectedSeller = {};
    $scope.selectedTypeheadSearchAccount = "";
    $scope.selectedTypeheadAddAccount = "";

    
    $scope.changeStatus = function(status){
        if($scope.selectedSeller.id == undefined || $scope.selectedSeller.status == status){
            return;
        }
        var r = confirm(" Bạn có chắc chắn muốn chuyển trạng thái của gian hàng");
        if (r == true) {
            var sellerServiceClient = new SellerServiceClient($http);
            sellerServiceClient.changeStatus($scope.selectedSeller.id, status, function(data){
                if(!data.isError){
                    location.reload();
                }
            }, function(){});
        } else {
            return;
        }
    };
    
    $scope.gotoPage = function(pageSize, page){
        $scope.pageSize = pageSize;
        $scope.pageNumber = page;
        $('#page_number').val($scope.pageNumber);
        $('#page_size').val($scope.pageSize);
        $('#search_from').submit();
    };
   $scope.jsonSelectedTypeheadAddAccount = function(){
       var json = JSON.stringify($scope.selectedTypeheadAddAccount);
       json = $scope.selectedTypeheadAddAccount.id == undefined ? null :json;
       return json;
   };
    
    $scope.loadingTypeheadSearchAccount = false;
    $scope.loadingTypeheadAddAccount = false;
    
    $scope.searchAccountAsyncCall = function(val,type){
        var sellerServiceClient = new SellerServiceClient($http);
        return sellerServiceClient.getFindingAccountThenCallback(val, searchAccountAsyncCallSucessCallback);
    };
    
    function searchAccountAsyncCallSucessCallback(data){
        if(!data.isError){
            return data.data.data;
        }
    };
    
    $scope.totalServerItems = 0;
    $scope.pageCollection = [];
    $scope.sellers = [];
    
    $scope.getPagedDataAsync = function (pageSize, page) {
        $scope.pageNumber =  page;
        $scope.userId = $scope.selectedTypeheadSearchAccount.id;
        sellerFindServiceClient = new SellerServiceClient($http);
        var offset = ($scope.pageNumber - 1) * $scope.pageSize;
        sellerFindServiceClient.getSeller($scope.userId,$scope.sellerName,$scope.pageSize,offset,getSellerSucessCallback,getSellerErrorCallback);
    };
    
    $scope.selectSeller = function(seller){
        $scope.selectedSeller = seller;
        sellerServiceClient = new SellerServiceClient($http);
        sellerServiceClient.getFindingAccountById(seller.portal_id, function(data){
            if(!data.isError){
                $scope.selectedTypeheadAddAccount = data.data[0];
            }
        }, function(){});
    };

    function getSellerSucessCallback(data){
        if(!data.isError){
            $scope.sellers = data.data['SELLER'];
            $scope.totalServerItems = data.data['COUNT'];
            $pageCount = ($scope.totalServerItems / $scope.pageSize);
            $scope.pageCollection = [1];
            for(var i=0;i < $pageCount; i++){
                $scope.pageCollection[i] = (i+1);
            }
        }
        $common.onLoaded();
    }
    
    function getSellerErrorCallback(xhr,status){}
    
    $scope.uploadFile = function(logo){
        sellerServiceClient = new SellerServiceClient($http);
        sellerServiceClient.uploadFile(logo, function(data){
            if(!data.isError){
                alert(data.data);
            }
        }, function(){alert(data.errorMessage);});
    };
    
    $scope.startup = function (){
        if($scope.userId == "" && $scope.sellerName == "" ){
            return;
        }
        
        if(!isNaN($scope.userId) && $scope.userId != ""){
            sellerServiceClient = new SellerServiceClient($http);
            sellerServiceClient.getFindingAccountById($scope.userId, function(data){
                if(!data.isError){
                    $scope.selectedTypeheadSearchAccount = data.data[0];
                    $scope.getPagedDataAsync($scope.pageSize,$scope.pageNumber);
                }
            }, function(){});
            $common.onLoading();
        }else{
            $scope.getPagedDataAsync($scope.pageSize,$scope.pageNumber);
            $common.onLoading();
        }
        
        $scope.pageSize = ($scope.pageSize == undefined || $scope.pageSize == '' || $scope.pageSize == null)? 10 : $scope.pageSize;
        $scope.pageNumber = ($scope.pageNumber == undefined || $scope.pageNumber == '' || $scope.pageNumber == null)? 1 : $scope.pageNumber;
        
    };
    
    $scope.startup();
}
SellerController.$inject = ['$scope','$http'];