function PortalUserListServiceClient($http)
{
    this.findUser = function(userid,account,firstName,lastname,limit,offset,sucessCallback,errorCallback){
        $http.post('/portal/__admin/user_find_post_xhr',
                $.param(
                        {userId:userid,account:account,firstName:firstName,lastname:lastname,limit:limit,offset:offset}),
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
    }
    
}