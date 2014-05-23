function PortalAdminInvoiceController($scope,$http)
{
    $scope.invoice = {};
    $scope.invoice.id = document.URL.split("/")[document.URL.split("/").length - 1];
    
    $scope.products = [];
    $scope.gridProductsOptions  = {data: 'products',enablePaging: false,showFooter: true,multiSelect: false};
    
    $scope.shippings = [];
    $scope.selectedShipping = [];
    $scope.gridShippingsOptions  = {data: 'shippings',enablePaging: false,showFooter: true,multiSelect: false,
                                    multiSelect: false,selectedItems: $scope.selectedShipping};
    
    $scope.otherCosts = [];
    $scope.gridOtherCostOptions  = {data: 'otherCosts',enablePaging: false,showFooter: true,multiSelect: false};
    
    
    $scope.selectedContact = {};
    
    $scope.getProducts = function(){
        portalAdminInvoiceController = new PortalAdminInvoiceServiceClient($http);
        portalAdminInvoiceController.getProducts($scope.invoice.id, getProductsSucessCallback, getError);
    };
    function getProductsSucessCallback(data){
        if(!data.isError){
            $scope.products = data.data;
        }
    }
    $scope.getshippings = function(){
        portalAdminInvoiceController = new PortalAdminInvoiceServiceClient($http);
        portalAdminInvoiceController.getShippings($scope.invoice.id, getshippingsSucessCallback, getError);
    };
    function getshippingsSucessCallback(data){
        if(!data.isError){
            $scope.shippings = data.data;
        }
    }
    
    $scope.getOtherCosts = function(){
        portalAdminInvoiceController = new PortalAdminInvoiceServiceClient($http);
        portalAdminInvoiceController.getOtherCost($scope.invoice.id, getOtherCostsSucessCallback, getError);
    };
    function getOtherCostsSucessCallback(data){
        if(!data.isError){
            $scope.otherCosts = data.data;
        }
    }
    
    $scope.getInvoice = function(){
        portalAdminInvoiceController = new PortalAdminInvoiceServiceClient($http);
        portalAdminInvoiceController.getInvoice($scope.invoice.id, getInvoiceSucessCallback, getError);
    };
    function getInvoiceSucessCallback(data){
        if(!data.isError){
            $scope.invoice = data.data;
        }
    }
    $scope.getContact = function(){
        if($scope.selectedShipping == undefined){
            return
        }
        portalAdminInvoiceController = new PortalAdminInvoiceServiceClient($http);
        portalAdminInvoiceController.getContact($scope.selectedShipping[0].fk_user_contact, getContactSucessCallback, getError);
    };
    function getContactSucessCallback(data){
        if(!data.isError){
            $scope.selectedContact = data.data;
        }
    }
    
    $scope.$watch('selectedShipping', function (newVal, oldVal) {
        if (newVal !== oldVal && newVal != undefined) {
            $scope.getContact();
        }
    }, true);
    
    function getError(xhr,status){
        
    }
    $scope.getProducts();
    $scope.getshippings();
    $scope.getOtherCosts();
    $scope.getInvoice();
}
PortalAdminInvoiceController.$inject = ['$scope','$http'];