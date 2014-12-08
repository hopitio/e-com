function PortalUserListServiceClient($http)
{
    this.findUser = function(userid,account,firstName,limit,offset,sucessCallback,errorCallback){
        $http.post('/portal/api/__admin/user_find_post_xhr',
                $.param(
                        {userId:userid,account:account,full_name:firstName,limit:limit,offset:offset}),
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
    
    this.updateUserRejectLogin = function(userId, sucessCallback, errorCallback){
        $url = '/portal/api/__admin/user/'+userId+'/reject_login';
        $http.post($url,
                $.param(
                        {userId:userId}),
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
    
    this.updateUserOpenLogin = function(userId, sucessCallback, errorCallback){
        $url = '/portal/api/__admin/user/'+userId+'/open_login';
        $http.post($url,
                $.param(
                        {userId:userId}),
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