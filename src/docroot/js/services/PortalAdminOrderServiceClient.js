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

}