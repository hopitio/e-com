function UserInformationServiceClient($http)
{
    this.getUserInformation = function(sucessCallback,errorCallback)
    {
        $http.get('/portal/account/get_user_information',
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
    }
    
    this.updateUserInformation = function(userInformation,sucessCallback,errorCallback){
        $http.post('/portal/account/update_user_information',
                $.param({userInformation:JSON.stringify(userInformation)}),
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