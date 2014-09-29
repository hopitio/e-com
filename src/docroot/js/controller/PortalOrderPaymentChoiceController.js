function PortalOrderPaymentChoiceController($scope, $http) {
    $scope.productPrices = 0;
    $scope.taxPrices = 0;
    $scope.shippingPrices = 0;
    
    $scope.orderInformation = orderInformation;
    $scope.paymentMethodCode = 'CASH';
    $scope.paymentBankcode = 'VCB';
    $scope.fnMoneyToString = fnMoneyToString;
    
    $scope.paymentMethodChanged = function($methodName){
        $scope.paymentMethodCode = $methodName;
    };
    
    $scope.orderInformation.invoice.products.forEach(function(product,index, array){
        $scope.productPrices += product.product_price;
        product.taxs.forEach(function(tax, index, array){
            $scope.taxPrices += tax.sub_tax_value;
        });
    });
    
    $scope.orderInformation.invoice.shippings.forEach(function(shipping,index,array){
        $scope.shippingPrices += shipping.price;
    });
    
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
