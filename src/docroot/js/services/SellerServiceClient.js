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
    
}