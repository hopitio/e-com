function PortalOrderEmailVerifyingController($scope,$http){
    $scope.productPrices = 0;
    $scope.taxPrices = 0;
    $scope.shippingPrices = 0;
    
    $scope.isHave = 'HAVE';
    $scope.email = '';
    $scope.password = '';
    $scope.orderInformation = orderInformation;
    $scope.fnMoneyToString = fnMoneyToString;
    
    $scope.orderInformation.invoice.products.forEach(function(product,index, array){
        $scope.productPrices += product.product_price;
        product.taxs.forEach(function(tax, index, array){
            $scope.taxPrices += tax.sub_tax_value;
        });
    });
    
    $scope.orderInformation.invoice.shippings.forEach(function(shipping,index,array){
        $scope.shippingPrices += shipping.price;
    });
    
    
    $scope.submitForm = function(){
        var isHaveNot = $('input[name=rbx-haveAccount]:checked', '#frmsub').val() == "NOTHAVE";
        var frm = $("#frmsub").validate();
        if(isHaveNot){
            $("#pasInput").removeAttr("required");
        }else{
            $("#pasInput").attr("required","required");
        }
        
        if(frm.errorList.length == 0){
            $("#frmsub").submit();
        }
    };
}
PortalOrderEmailVerifyingController.$inject = ['$scope','$http'];