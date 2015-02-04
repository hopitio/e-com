function PortalAdminOrderController($scope,$http)
{
    $scope.order = {};
    $scope.order.id = document.URL.split("/")[document.URL.split("/").length - 1];
    $scope.orderHistories = [];
    $scope.comment = '';
    $scope.dialogCallback = function(){};
    $scope.onSubmit = false;
    this.modalInstance = '';
    $scope.getOrder = function(){
        portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
        portalAdminOrderServiceClient.getorder($scope.order.id, getOrderSucessCallback, getErrorCallback);
    };
    
    $scope.getHistories = function(){
        portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
        portalAdminOrderServiceClient.getStatusHistories($scope.order.id, getOrderHistorySucessCallback, getErrorCallback);
    };
    
    function getOrderSucessCallback(data){
        if(!data.isError){
            $scope.order = data.data;
        }
    }
    function getOrderHistorySucessCallback(data){
        if(!data.isError){
            $scope.orderHistories = data.data;
        }
    }
    
    function getErrorCallback(xhr,status){}
    
    
    
    $scope.nextStatus = function(){
    	var r = confirm("Bạn có thực sự muốn chuyển trạng thái của order hiện tại");
    	if(!r){
    		return;
    	}
        $scope.dialogCallback = function(){
            $("#comment-dialog").modal('hide');
            
            portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
            portalAdminOrderServiceClient.postNextOrderStatus($scope.order.id, $scope.comment, changStatusSucessCallback, changStatusErrorCallback);
        };
        $scope.onSubmit = true;
        $("#comment-dialog").modal();
    };
    
    $scope.backStatus = function(){
    	var r = confirm("Bạn có thực sự muốn chuyển trạng thái của order hiện tại");
    	if(!r){
    		return;
    	}
        $scope.dialogCallback = function(){
            $("#comment-dialog").modal('hide');
            
            portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
            portalAdminOrderServiceClient.postBackOrderStatus($scope.order.id, $scope.comment, changStatusSucessCallback, changStatusErrorCallback);
        };
        $scope.onSubmit = true;
        $("#comment-dialog").modal();
    };
    
    $scope.rejectStatus = function(){
    	var r = confirm("Bạn có thực sự muốn chuyển trạng thái của order hiện tại");
    	if(!r){
    		return;
    	}
        $scope.dialogCallback = function(){
            $("#comment-dialog").modal('hide');
            portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
            portalAdminOrderServiceClient.rejectOrderStatus($scope.order.id, $scope.comment, changStatusSucessCallback, changStatusErrorCallback);
        };
        $scope.onSubmit = true;
        $("#comment-dialog").modal();
    };
    
    $scope.failDeiveryStatus = function(){
    	var r = confirm("Bạn có thực sự muốn chuyển trạng thái của order hiện tại");
    	if(!r){
    		return;
    	}
        $scope.dialogCallback = function(){
            $("#comment-dialog").modal('hide');
            portalAdminOrderServiceClient = new PortalAdminOrderServiceClient($http);
            portalAdminOrderServiceClient.failToDelivery($scope.order.id, $scope.comment, changStatusSucessCallback, changStatusErrorCallback);
        };
        $scope.onSubmit = true;
        $("#comment-dialog").modal();
    };
    
    $scope.driectToRefuned = function(){
        window.location = "/portal/__admin/order/"+$scope.order.id+"/refuned";
    };
    
    function changStatusSucessCallback(data){
        if(!data.isError){
            alert(data.data);
            $scope.onSubmit = false;
            location.reload();
        }else{
            alert(data.errorMessage);
        }
    }
    
    function changStatusErrorCallback(xhr,status){
        
    }
    
    $scope.getOrder();
    $scope.getHistories();
}
PortalAdminOrderController.$inject = ['$scope','$http'];
