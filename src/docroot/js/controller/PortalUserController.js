function PortalUserController($scope,$http)
{
    
    $scope.user = window.user;
    $scope.histories ;
    $scope.contacts ;
    $scope.settings ;
    $scope.totalHistoryItem;
    $scope.startDate = '';
    $scope.endDate = '';
    $scope.alerts = [];
    $scope.pagingOptions = {
            pageSizes: [10, 20, 30, 50, 100],
            pageSize: 10,
            currentPage: 1,
        }; 
    $scope.gridOptionsHistory = {
            data: 'histories',
            enablePaging: true,
            showFooter: true,
            enableCellEditOnFocus: true,
            totalServerItems: 'totalHistoryItem',
            pagingOptions: $scope.pagingOptions,
            multiSelect: false,
   };
     
    
    $scope.gridOptionsContact = {
            data: 'contacts',
            showFooter: true,
            multiSelect: false,
            enableCellEditOnFocus: true,
   };
    
    $scope.gridOptionsSetting = {
            data: 'settings',
            showFooter: true,
            multiSelect: false,
            enableCellEditOnFocus: true,
   };
    //-------------------------------------------------------------------------------------------
    $scope.getContacts = function(){
        portalUserServiceClient = new PortalUserServiceClient($http);
        portalUserServiceClient.getUserContact(getContactSucessCallback, getErrorCallback);
    };
    function getContactSucessCallback(data){
        if(!data.isError){
            $scope.contacts = data.data;
            if (!$scope.$$phase) {
                $scope.$apply();
            }
        }
    }
    //-------------------------------------------------------------------------------------------
    $scope.gethistories = function(offset,limit){
        portalUserServiceClient = new PortalUserServiceClient($http);
        limit = $scope.pagingOptions.pageSize;
        offset = ($scope.pagingOptions.currentPage - 1) * $scope.pagingOptions.pageSize;
        portalUserServiceClient.getUserHistory($scope.startDate,$scope.endDate,limit, offset, gethistorySucessCallback, getErrorCallback);
    };
    function gethistorySucessCallback(data){
        if(!data.isError){
            $scope.setDataHistoriesPaging(data.data['histories'],data.data['count']);
            
        }
    }
    $scope.setDataHistoriesPaging = function(histories,count){
        $scope.histories = histories;
        $scope.totalHistoryItem = count;
        if (!$scope.$$phase) {
            $scope.$apply();
        }
    };
    
    $scope.$watch('pagingOptions', function (newVal, oldVal) {
        if (newVal !== oldVal && newVal.currentPage !== oldVal.currentPage) {
          $scope.gethistories(($scope.pagingOptions.currentPage - 1)  * $scope.pagingOptions.pageSize, $scope.pagingOptions.pageSize);
        }
    }, true);

    
    //-------------------------------------------------------------------------------------------
    $scope.getSettings = function(){
        portalUserServiceClient = new PortalUserServiceClient($http);
        portalUserServiceClient.getUserSetting(getSettingSucessCallback, getErrorCallback);
    };
    function getSettingSucessCallback(data){
        if(!data.isError){
            $scope.settings = data.data;
            if (!$scope.$$phase) {
                $scope.$apply();
            }
        }
    }
    //-------------------------------------------------------------------------------------------
    function getErrorCallback(xhr,status){
        
    }
    
    $scope.rejectLogin = function(){
        portalUserServiceClient = new PortalUserServiceClient($http);
        portalUserServiceClient.updateUserRejectLogin($scope.user.id, loginUpdateCallback, getErrorCallback);
    };
    function loginUpdateCallback(data){
        if(!data.isError){
            $scope.alerts.push({type:'success' , msg: 'Cập nhật thành công.'});
            location.reload();
        }else{
            $scope.alerts.push({type:'danger' , msg: data.errorMessage});
        }
    }
    
    $scope.closeAlert = function(index){
        $scope.alerts.splice(index, 1);
    };
    
    $scope.openLogin =function(){
        portalUserServiceClient = new PortalUserServiceClient($http);
        portalUserServiceClient.updateUserOpenLogin($scope.user.id, loginUpdateCallback, getErrorCallback);
    };

    $scope.gethistories($scope.pagingOptions.currentPage * $scope.pagingOptions.pageSize,$scope.pagingOptions.pageSize);
    $scope.getSettings();
    $scope.getContacts();
}
PortalUserController.$inject = ['$scope','$http'];