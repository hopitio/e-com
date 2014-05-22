function PortalUserOrderHistoryServiceClient($http){
    this.getAllOrderHistory = function(fix,sucessCallback,errorCallback){
        $http.get('/portal/api/account/order_history/'+fix,
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