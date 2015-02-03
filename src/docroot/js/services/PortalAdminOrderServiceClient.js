function PortalAdminOrderServiceClient($http)
{
    this.getorder = function(orderId,sucessCallback,errorCallback)
    {
        $http.get('/portal/api/__admin/order/'+orderId,
                {headers:{"If-Modified-Since":"Thu,01 Jun 1970 00:00:00 GMT"}}
        ).success(function(data){
            if(typeof sucessCallback === 'function'){
                sucessCallback(data);
            }
        }).error(function(xhr, status, error){
            if(typeof errorCallback === 'function'){
                errorCallback(xhr,status);
            }
        });
    };
    
    this.getStatusHistories = function(orderId,sucessCallback,errorCallback)
    {
        $http.get('/portal/api/__admin/order/'+orderId+'/status_histories',
                {headers:{"If-Modified-Since":"Thu,01 Jun 1970 00:00:00 GMT"}}
        ).success(function(data){
            if(typeof sucessCallback === 'function'){
                sucessCallback(data);
            }
        }).error(function(xhr, status, error){
            if(typeof errorCallback === 'function'){
                errorCallback(xhr,status);
            }
        });
    };
    
    this.postNextOrderStatus = function(orderId,commentContent,sucessCallback,errorCallback){
        $url = '/portal/api/__admin/order/'+orderId+'/status_next';
        $http.post($url,
                $.param(
                        {comment:commentContent}),
                        {headers:{"If-Modified-Since":"Thu,01 Jun 1970 00:00:00 GMT",'Content-Type':'application/x-www-form-urlencoded;charset=utf-8'}}
        ).success(function(data){
            if(typeof sucessCallback === 'function'){
                sucessCallback(data);
            }
        }).error(function(xhr, status, error){
            if(typeof errorCallback === 'function'){
                errorCallback(xhr,status);
            }
        });
    };
    
    this.postBackOrderStatus = function(orderId,commentContent,sucessCallback,errorCallback){
        $url = '/portal/api/__admin/order/'+orderId+'/status_back';
        $http.post($url,
                $.param(
                        {comment:commentContent}),
                        {headers:{"If-Modified-Since":"Thu,01 Jun 1970 00:00:00 GMT",'Content-Type':'application/x-www-form-urlencoded;charset=utf-8'}}
        ).success(function(data){
            if(typeof sucessCallback === 'function'){
                sucessCallback(data);
            }
        }).error(function(xhr, status, error){
            if(typeof errorCallback === 'function'){
                errorCallback(xhr,status);
            }
        });
    };
    
    this.rejectOrderStatus = function(orderId,commentContent,sucessCallback,errorCallback){
        $url = '/portal/api/__admin/order/'+orderId+'/status_reject';
        $http.post($url,
                $.param(
                        {comment:commentContent}),
                        {headers:{"If-Modified-Since":"Thu,01 Jun 1970 00:00:00 GMT",'Content-Type':'application/x-www-form-urlencoded;charset=utf-8'}}
        ).success(function(data){
            if(typeof sucessCallback === 'function'){
                sucessCallback(data);
            }
        }).error(function(xhr, status, error){
            if(typeof errorCallback === 'function'){
                errorCallback(xhr,status);
            }
        });
    };
    
    this.failToDelivery = function(orderId,commentContent,sucessCallback,errorCallback){
    	$url = '/portal/api/__admin/order/'+orderId+'/status_fail_to_delivery';
    	$http.post($url,$.param({comment:commentContent}),
                        {headers:{"If-Modified-Since":"Thu,01 Jun 1970 00:00:00 GMT",'Content-Type':'application/x-www-form-urlencoded;charset=utf-8'}}
        ).success(function(data){
            if(typeof sucessCallback === 'function'){
                sucessCallback(data);
            }
        }).error(function(xhr, status, error){
            if(typeof errorCallback === 'function'){
                errorCallback(xhr,status);
            }
        });
    };
}