function PortalOrderEmailVerifyingController($scope,$http){
    $scope.isHave = 'HAVE';
    $scope.email = '';
    $scope.password = '';
    $scope.submitForm = function(){
        $("#frmsub").submit();
    };
}
PortalOrderEmailVerifyingController.$inject = ['$scope','$http'];