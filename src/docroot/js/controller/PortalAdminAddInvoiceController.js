function PortalAdminAddInvoiceController($scope,$http)
{
	$scope.order = order;
    $scope.orderHistories = [];
    $scope.products = $scope.order.uniqueProducts;
    $scope.otherCosts = [];
    $scope.contacts = [];
    $scope.invoiceComment = '';
    $scope.selectedContact = [];
    $scope.invoiceTypes = [{value:"INPUT", name:"Hóa đơn đầu vào (INPUT)"},{value:"OUTPUT", name:"Hóa đơn đầu ra (OUTPUT)"}];
    $scope.invoiceType = $scope.invoiceTypes[0];
    $scope.paymentTypes = [
                           {value:"PAYMENT_BY_NGANLUONG",name:"Thanh toán qua Ngân Lượng"},
                           {value:"PAYMENT_BY_CASH",name:"Thanh toán Tiền mặt"},
                           ];
    $scope.paymentType = $scope.paymentTypes[0];
    $scope.NLCode = "";
    $scope.paiedDate = "";
    
    for(var i=0;i<$scope.products.length;i++){
        $scope.products[i].choiced = false;
        $scope.products[i].refuned_quantity_allow = [];
        for(var j = 0;j<$scope.products[i].product_quantity; j++)
        {
            $scope.products[i].refuned_quantity_allow[j] = j;
        }
        $scope.products[i].refuned_quantity = 0;
        $scope.products[i].refuned_price = 0;
    }
    for(var i=0;i<$scope.order.invoices.length;i++)
    {
        for(var j = 0; j < $scope.order.invoices[i].shippings.length; j++){
            var isExits = false;
            for(var k =0 ; k < $scope.contacts.length; k++ ){
                if($scope.order.invoices[i].shippings[j].contact.id == $scope.contacts[k].id){
                    isExits = true;
                    continue;
                }
            }
            if(isExits) continue;
            $scope.contacts.push($scope.order.invoices[i].shippings[j].contact); 
            $scope.contacts[$scope.contacts.length - 1].choiced = false;
            $scope.contacts[$scope.contacts.length - 1].prices = 0;
        }
    }
    $scope.selectedContact = $scope.contacts[$scope.contacts.length - 1];
    //END - 
    $scope.otherCostAdd = function(){
        $scope.otherCosts.push({comment:"",prices:0});
    };
    $scope.removeOtherCost = function(cost){
        var index = $scope.otherCosts.indexOf(cost);
        if (index > -1) {
            $scope.otherCosts.splice(index, 1);
        }
    };
    $scope.getPostValues = function(){
        $var = {
           products : $scope.products,
           otherCosts : $scope.otherCosts,
           comment  : $scope.invoiceComment,
           contact : $scope.selectedContact,
           invoice : {  invoiceType:$scope.invoiceType,
        	   			paymentType:$scope.paymentType,
        	   			nlCode:$scope.NLCode,
        	   			paiedDate:$scope.paiedDate}
        };
        return JSON.stringify($var);
    };
    $scope.submitFrm = function(){
        $("#frm-refuned-data").submit();
    };
    $scope.setChoicedContact = function(contact){
        $scope.selectedContact = contact;
    };
    
    $scope.getHistories = function(){
        portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
        portalAdminOrderServiceClient.getStatusHistories($scope.order.id, getOrderHistorySucessCallback, getErrorCallback);
    };
    function getErrorCallback(data){
        //TODO SOMETHING :
    }
    function getOrderHistorySucessCallback(data){
        if(!data.isError){
            $scope.orderHistories = data.data;
        }
    }
    $scope.getHistories();
    
}
PortalAdminAddInvoiceController.$inject = ['$scope','$http'];