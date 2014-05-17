function PortalUserController($scope,$http)
{
    
    $scope.user = window.user;
    $scope.history ;
    $scope.contact ;
    $scope.setting ;
    $scope.gridOptionsHistory = {
            data: 'history',
            enablePaging: true,
            showFooter: true,
            totalServerItems: 'totalServerItems',
            pagingOptions: $scope.pagingOptions,
            filterOptions: $scope.filterOptions,
            multiSelect: false,
   };
    
    $scope.gridOptionsContact = {
            data: 'contact',
            enablePaging: false,
            showFooter: true,
            multiSelect: false,
   };
    
    $scope.gridOptionsSetting = {
            data: 'setting',
            enablePaging: false,
            showFooter: true,
            multiSelect: false,
   };
    
    
    
}
PortalUserController.$inject = ['$scope','$http'];