function PortalOrderPaymentChoiceController($scope, $http) {
    $scope.orderInformation = orderInformation;
    $scope.paymentMethodCode = 'CASH';
    $scope.paymentBankcode = 'VCB';
    $scope.paymentMethodChanged = function($methodName){
        $scope.paymentMethodCode = $methodName;
    };
    
    $scope.setSelectedBankCode = function($event){
        $scope.paymentBankcode = $($event.currentTarget).find("input[name=bankcode]:first").val();
        $('.bank-online-methods').removeClass('active');
        $($event.currentTarget).addClass('active');
        
    };
    
    $scope.submit = function(){
        $('#frm-submit').submit();
    };
    
};
PortalOrderPaymentChoiceController.$inject = ['$scope', '$http'];
