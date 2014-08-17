function PortalUserListController($scope,$http)
{
    
    $scope.userId = ""; 
    $scope.account = "";
    $scope.firstName = "";
    $scope.lastName = "";
    $scope.filterOptions = {
            filterText: "",
            useExternalFilter: true
    }; 
    $scope.alerts = [];
    
    $scope.totalServerItems = 0;
    $scope.pagingOptions = {
        pageSizes: [10, 20, 30, 50, 100],
        pageSize: 50,
        currentPage: 1,
    };  
    
    $scope.gridOptions = {
            data: 'users',
            enablePaging: true,
            showFooter: true,
            totalServerItems: 'totalServerItems',
            pagingOptions: $scope.pagingOptions,
            multiSelect: false,
            columnDefs: [
                         {field: 'id',displayName: 'ID'},
                         {field: 'firstname',displayName: 'Họ và tên đệm'},
                         {field: 'lastname',displayName: 'Tên'},
                         {field: 'account',displayName: 'Email'},
                         {field: 'DOB',displayName: 'Ngày sinh'},
                         {field: 'status',displayName: 'Trạng thái'},
                         {field: 'status_date',displayName: 'Ngày cập nhật trạng thái'},
                         {field: '',displayName: '', cellTemplate:"actionCell.html"},
                         ]
        };

    $scope.setPagingData = function(data, total){  
        $scope.users = data;
        $scope.totalServerItems = total;
        if (!$scope.$$phase) {
            $scope.$apply();
        }
        if($scope.dataTable != undefined){
            return;
        }
        $scope.dataTable = $("#user-datatable").dataTable({
            "paging":   false,
            "ordering": false,
            "info":     false,
            'filter':   false
        });
    };
    
    $scope.getPagedDataAsync = function (pageSize, page) {
        portalUserListController = new PortalUserListServiceClient($http);
        portalUserListController.findUser($scope.userId, $scope.account,
                $scope.firstName, $scope.lastName, pageSize, pageSize
                        * (page - 1), getSellerSucessCallback,
                getSellerErrorCallback);
    };
    
    $scope.find = function(){
        portalUserListController = new PortalUserListServiceClient($http);
        portalUserListController.findUser($scope.userId, $scope.account,
                $scope.firstName, $scope.lastName, $scope.pagingOptions.pageSize, 0,
                getSellerSucessCallback, getSellerErrorCallback);
    };
    
    function getSellerSucessCallback(data){
        if(!data.isError){
            $scope.setPagingData(data.data['result'], data.data['count']);
        }
    }
    
    function getSellerErrorCallback(xhr,status){
        
    }
    
    $scope.$watch('pagingOptions', function (newVal, oldVal) {
        if (newVal !== oldVal && newVal.currentPage !== oldVal.currentPage) {
          $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage, $scope.filterOptions.filterText);
        }
    }, true);
    
    $scope.openLoginStatus = function(userId){
        $scope.alerts = [];
        portalUserListServiceClient = new PortalUserListServiceClient($http);
        portalUserListServiceClient.updateUserOpenLogin(userId, loginUpdateCallback, loginUpdateErrorCallback);
    };
    
    $scope.rejectLoginStatus = function(userId){
        $scope.alerts = [];
        portalUserListServiceClient = new PortalUserListServiceClient($http);
        portalUserListServiceClient.updateUserRejectLogin(userId, loginUpdateCallback, loginUpdateErrorCallback);
    };
    
    function loginUpdateCallback(data){
        if(!data.isError){
            $scope.alerts.push({type:'success' , msg: 'Cập nhật thành công.'});
            $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage);
        }else{
            $scope.alerts.push({type:'danger' , msg: data.errorMessage});
        }
    }
    
    function loginUpdateErrorCallback(xhr,status){
        
    }
    
    $scope.closeAlert = function(index){
        $scope.alerts.splice(index, 1);
    };
    
    
}
PortalUserListController.$inject = ['$scope','$http'];