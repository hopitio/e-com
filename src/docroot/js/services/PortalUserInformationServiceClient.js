function PortalUserInformationServiceClient($http)
{
    this.getUserInformation = function(sucessCallback,errorCallback)
    {
        $http.get('/portal/api/account/get_user_information',
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
    
    this.updateUserInformation = function(userInformation,sucessCallback,errorCallback){
        $http.post('/portal/api/account/update_user_information',
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
    };
    
    this.getUserContacts = function(sucessCallback,errorCallback){
       $http.get('/portal/api/account/get_user_contacts',
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
    
    this.saveContact = function(contact,sucessCallback,errorCallback){
        $http.post('/portal/api/account/save_contact',
                $.param({result:JSON.stringify(contact)}),
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