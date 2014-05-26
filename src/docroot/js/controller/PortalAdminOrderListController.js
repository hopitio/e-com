function PortalAdminOrderListController($scope,$http)
{
    
    $scope.orderId = ""; 
    $scope.account = "";
    $scope.createDate = "";
    $scope.alerts = [];
    $scope.orders = [];
    $scope.invoices = [];
    $scope.selectdOrder = [];
    $scope.selectedInvoice = [];
    
    $scope.totalServerItems = 0;
    
    
    $scope.pagingOptions = {
        pageSizes: [10, 20, 30, 50, 100],
        pageSize: 10,
        currentPage: 1,
        
    };  

    $scope.gridOptions = {
            data: 'orders',
            enablePaging: true,
            showFooter: true,
            totalServerItems: 'totalServerItems',
            pagingOptions: $scope.pagingOptions,
            multiSelect: false,
            selectedItems: $scope.selectdOrder,
            columnDefs:[
                        {field:'id',width:'50px', displayName:'Mã'},
                        {field:'t_user_account', displayName:'Tài khoản'},
                        {field:'created_date', displayName:'Ngày tạo'},
                        {field:'shiped_date', displayName:'Ngày chuyển hàng'},
                        {field:'completed_date', displayName:'Ngày hoàn thành'},
                        {field:'canceled_date', displayName:'Ngày hủy'},
                        {field:'detailUrl',width:'30px', displayName:'',cellTemplate:'actionCell.html'},
                        ]
        };
    
    $scope.gridInvoicesOptions = {
            data: 'invoices',
            enablePaging: false,
            showFooter: true,
            multiSelect: false,
            selectedItems: $scope.selectedInvoice,
            columnDefs:[
                        {field:'id',width:'50px', displayName:'Mã'},
                        {field:'created_date', displayName:'Ngày tạo'},
                        {field:'paid_date', displayName:'Ngày thanh toán'},
                        {field:'cancelled_date', displayName:'Ngày K/H hủy'},
                        {field:'rejected_date', displayName:'Ngày H/T hủy'},
                        {field:'comment', displayName:'Ghi chú'},
                        
                        ]
    };
    
    $scope.setPagingData = function(data, total){  
        $scope.orders = data;
        $scope.totalServerItems = total;
        if (!$scope.$$phase) {
            $scope.$apply();
        }
    };
    
    $scope.getPagedDataAsync = function (pageSize, page) {
        portalAdminOrderListServiceClient = new PortalAdminOrderListServiceClient($http);
        portalAdminOrderListServiceClient.findOrder($scope.account,$scope.orderId,$scope.createdDate, 
                        pageSize, pageSize * (page - 1), 
                        getOrderSucessCallback, getOrderErrorCallback);
    };
    
    $scope.getInvoicesAsync = function(){
        if($scope.selectdOrder.length == 0){
            return;
        }
        portalAdminOrderListServiceClient = new PortalAdminOrderListServiceClient($http);
        portalAdminOrderListServiceClient.getInvoices($scope.selectdOrder[0].id, getInvoiceSucessCallback, getInvoiceErrorCallback);
    };
    
    $scope.find = function(){
        $scope.getPagedDataAsync($scope.pagingOptions.pageSize, 1);
    };
    
    function getOrderSucessCallback(data){
        if(!data.isError){
            $scope.setPagingData(data.data['result'], data.data['count']);
        }
    }
    
    function getInvoiceSucessCallback(data){
        if(!data.isError){
            $scope.invoices = data.data;
        }
    } 
    
    function getOrderErrorCallback(xhr,status){
        
    }
    
    function getInvoiceErrorCallback(xhr,status){
        
    }
    
    $scope.$watch('pagingOptions', function (newVal, oldVal) {
        if (newVal !== oldVal) {
          $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage);
        }
    }, true);
    
    $scope.$watch('selectdOrder', function (newVal, oldVal) {
        if (newVal !== oldVal) {
            $scope.getInvoicesAsync();
        }
    }, true);
    
    $scope.$watch('selectedInvoice', function (newVal, oldVal) {
        if (newVal !== oldVal && newVal != undefined) {
            window.open($scope.selectedInvoice[0].detailUrl,"_blank");
            $scope.selectedInvoice[0] = undefined;
        }
    }, true);

    
}
PortalAdminOrderListController.$inject = ['$scope','$http'];