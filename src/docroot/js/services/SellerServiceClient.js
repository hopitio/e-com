function SellerServiceClient($http){
    
    this.getSeller = function(userid,shopName,pageSize,pageNumber,sucessCallback,errorCallback)
    {
        $http.get('/__admin/seller_find/'+pageSize+'/'+pageNumber+'?UID='+userid+'&NAME='+shopName,
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
    
    this.getFindingAccount = function(account,sucessCallback,errorCallback)
    {
        var search = encodeURIComponent(account);
        $http.get('/portal/api/user/find?account='+search,
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
    
    this.getFindingAccountThenCallback = function(account, thenFunction){
       var search = encodeURIComponent(account);
       return $http.get('/portal/api/user/find?account='+search,{headers:{"If-Modified-Since":"Thu,01 Jun 1970 00:00:00 GMT"}}
              ).then(function(data){
                  if(typeof thenFunction === 'function'){
                     return thenFunction(data);
                  }
              });
    };
    
}