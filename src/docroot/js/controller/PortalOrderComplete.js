function PortalOrderComplete($scope, $http) {
    $scope.payments;
    $scope.times;
    $scope.currencys;
    $scope.order;
    
};
PortalOrderComplete.$inject = ['$scope', '$http'];
$(document).ready(function(){
    $('#btnComfirm').click(function(){
        $('#frmsub').submit();
        });
});