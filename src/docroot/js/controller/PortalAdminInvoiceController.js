function PortalAdminInvoiceController($scope,$http)
{
    $scope.invoice = {};
    $scope.invoice.id = window.location.href.split('?')[0].split("/")[window.location.href.split('?')[0].split("/").length - 1];
    $scope.editPaidedDate = '';
    $scope.editPaymentMethod = 'CASH';
    $scope.editInvoicePaymentId = '';
    $scope.getInvoice = function(){
        portalAdminInvoiceController = new PortalAdminInvoiceServiceClient($http);
        portalAdminInvoiceController.getInvoice($scope.invoice.id, getInvoiceSucessCallback, getError);
        
        $('#frm-update-paided-date').attr('action','/portal/__admin/invoice/'+$scope.invoice.id+'/update_paided_date');
        $('#frm-destroy-invoice').attr('action','/portal/__admin/invoice/'+$scope.invoice.id+'/destroy');
        
        
    };
    function getInvoiceSucessCallback(data){
        if(!data.isError){
            $scope.invoice = data.data;
        }
    }
    function getError(xhr,status){
        
    }
    
    $scope.openPaidedDateDialog = function(){
        $('#paided-date-pop').modal('show');
    };
    $("#frm-update-paided-date input[name=callback]").val(window.location.href.split('?')[0]);
    $("#frm-destroy-invoice input[name=callback]").val(window.location.href.split('?')[0]);
    
    $scope.savePaidedDate = function(){
        $("#paided-date").val($scope.editPaidedDate);
        $("#invoice-payment-method").val($scope.editPaidedDate);
        $("#invoice-payment-id").val($scope.editInvoicePaymentId);
        $("#frm-destroy-invoice").submit();
    };
    
    $scope.destroyInvoice = function(){
        $("#frm-destroy-invoice").submit();
    };
    
    var common = new Common();
    var ActionCallback = common.getParameterByName('action_status');
    if(ActionCallback == 'complete'){
        $("#alert-complete").show();
    }else{
        $("#alert-complete").hide();
    }
    $scope.getInvoice();
}
PortalAdminInvoiceController.$inject = ['$scope','$http'];