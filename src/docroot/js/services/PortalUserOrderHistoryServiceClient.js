function PortalUserOrderHistoryServiceClient($http){
    this.getAllOrderHistory = function(fix,page,sucessCallback,errorCallback){
        $http.get('/portal/api/account/order_history/'+fix+'?page='+page,
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
    
    this.cancelOrder = function(order,comment,sucessCallback,errorCallback){
        $http.post('/portal/api/account/order_history/cancel_order',
                $.param({
                        order:order,
                        comment:comment,
                    }),
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
    
    this.getTotalOrderNumber = function(userId,sucessCallback,errorCallback){
    	$http.get('/portal/api/account/'+userId+'/order_history_total_order_number',
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
}