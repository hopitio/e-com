function PortalUserSecurityServiceClient($http){
    
    this.updatePassword = function(oldPass,newPass,comfirmPass,sucessCallback,errorCallback)
    {
        $http.post('/portal/account/update_password',
                $.param({
                        oldPassword:oldPass,
                        newPassword:newPass,
                        confrimPassword:comfirmPass,
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
    }
    
    this.updateAlertEmail = function(newEmail,sucessCallback,errorCallback){
        $http.post('/portal/account/update_alert_email',
                $.param({email:newEmail}),
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
    
    this.getSeller = function(userid,shopName,sucessCallback,errorCallback)
    {
        $http.get('/portal/account/last_login/'+count,
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
    
}