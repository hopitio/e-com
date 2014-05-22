function PortalAdminOrderListServiceClient($http)
{
    this.findOrder = function(account,orderId,createdDate,limit,offset,sucessCallback,errorCallback)
    {
        $http.post('/portal/__admin/order_find_post_xhr',
                $.param({account:account,orderId:orderId,createdDate:createdDate,limit:limit,offset:offset}),
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
    
    
    /portal/account/order_history/
}