function SellerInvoiceDetailController($scope,$http)
{
	$scope.config = serller_invoice_config;
	$scope.invoice;
	$scope.shipping;
	$scope.totalSellerProduct = 0;
	
	$http.get(serller_invoice_config.apiUrl,
            {headers:{"If-Modified-Since":"Thu,01 Jun 1970 00:00:00 GMT"}}
    ).success(function(data){
    	$scope.invoice = data;
    	for(var i = 0 ; i< data.shippings.length; i++){
    		if(data.shippings[i].shipping_type == "SHIP"){	
    			$scope.shipping = data.shippings[i];
    	    }
    	}
    	for(var i = 0 ; i< data.products.length; i++){
    		if(data.products[i].seller_id == $scope.config.sellerId){
    			$scope.totalSellerProduct += parseInt( data.products[i].sell_price);
    		}
    	}
    }).error(function(xhr, status, error){});
	
}
SellerInvoiceDetailController.$inject = ['$scope','$http'];