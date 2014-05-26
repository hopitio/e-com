function PortalAdminInvoiceController($scope,$http)
{
    $scope.invoice = {};
    $scope.invoice.id = document.URL.split("/")[document.URL.split("/").length - 1];
    
    $scope.getInvoice = function(){
        portalAdminInvoiceController = new PortalAdminInvoiceServiceClient($http);
        portalAdminInvoiceController.getInvoice($scope.invoice.id, getInvoiceSucessCallback, getError);
    };
    function getInvoiceSucessCallback(data){
        if(!data.isError){
            $scope.invoice = data.data;
        }
    }
    function getError(xhr,status){
        
    }

    $scope.getInvoice();
}
PortalAdminInvoiceController.$inject = ['$scope','$http'];