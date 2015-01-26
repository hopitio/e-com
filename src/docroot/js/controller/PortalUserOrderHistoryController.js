
function PortalUserOrderHistoryController($scope,$http)
{
    $scope.onLoadOrder = false;
    $scope.Common = new Common();
    $scope.template = "ModalOrderList.html";
    $scope.comment = '';
    $scope.cancelOrder = {};
    $scope.totalPageNumber = 0;
    $scope.page = {currentPage : 0, pages : []};
    var modalInstance ;
    $scope.loadAllOrder = function(){
    	page = $scope.getParameterByName('page');
    	page = page == null ? 1 : page;
        userOrderHistoryServiceClient = new PortalUserOrderHistoryServiceClient($http);
        userOrderHistoryServiceClient.getAllOrderHistory('all',page, getAllOrderHistorySucessCallback, getAllOrderHistoryErrorCallback);
        $scope.onLoadOrder = true;
    };
    function getAllOrderHistorySucessCallback(result){
        $scope.onLoadOrder = false;
        if(result.isError){
            
        }else{
            $scope.orders = result.data;
            $scope.getTotalOrderNumber();
        }
    }
        
    function getAllOrderHistoryErrorCallback(xhr,state)
    {
        $scope.onLoadOrder = false;
    }
    $scope.parseInt = function(val){
        return parseInt(val);
    };
    $scope.preStatusOrder = function(val){
       return val.replace("_", " ");
    };
    
    
    $scope.showOrderDetail = function(order)
    {
        $scope.template = "ModalOrderDetail.html";
        $scope.order = order;
    };
    
    $scope.backToList = function (){
        $scope.template = "ModalOrderList.html";
        $scope.order = undefined;
    };
    
    $scope.cancelOrder = function(order){
        $("#comment-modal").modal('show');
        $scope.cancelOrder = order;
    };
    
    $scope.cancelOrderPost = function(){
        $scope.Common.onLoading();
        $("#comment-modal").modal('hide');
        userOrderHistoryServiceClient = new PortalUserOrderHistoryServiceClient($http);
        userOrderHistoryServiceClient.cancelOrder(JSON.stringify($scope.cancelOrder), $scope.comment, onCancelOrderSucessCallback, getAllOrderHistoryErrorCallback);
    };
    
    $scope.getTotalOrderNumber = function(){
    	userOrderHistoryServiceClient = new PortalUserOrderHistoryServiceClient($http);
    	userOrderHistoryServiceClient.getTotalOrderNumber(window.__me_id__, function(data){
    		 $scope.totalPageNumber = Math.floor(data.total / 10) + 1;
    		 for(var i = 0 ;i < $scope.totalPageNumber; i++){
    			$scope.page.pages.push(
    			   { url:"/portal/account/order_history?page="+(i+1) }
    			);
    			$currentPage = $scope.getParameterByName('page');
    			$scope.page.currentPage = $currentPage == null ? 0 : $currentPage;
    		 }
    	}, function(){
    		
    	});
    };
    
    
    $scope.getParameterByName = function(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    $scope.returnOrder = function(order){
        window.location = order.returnUrl;
    };
    
    function onCancelOrderSucessCallback(reuslt){
        if(!reuslt.isError){
            $scope.Common.onLoaded();
            alert(reuslt.data.message);
            location.reload();
        }
    }
    
    $scope.loadAllOrder();

}

function ModalInstanceCtrl($scope, $modalInstance, order) {
    $scope.dialog = {};
    $scope.dialog.comment = '';
    $scope.dialog.order = order;
    $scope.ok = function () {
      $modalInstance.close($scope.dialog);
    };
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}

PortalUserOrderHistoryController.$inject = ['$scope','$http'];

