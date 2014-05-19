function PortalUserServiceClient($http)
{
    this.getUserHistory = function(startDate,endDate,limit,offset,sucessCallback,errorCallback){
        $url = document.URL + '/history';
        $http.post($url,
                $.param(
                        {limit:limit,offset:offset,startDate:startDate,endDate:endDate}),
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
    
    this.getUserContact = function(sucessCallback,errorCallback){
        $url = document.URL + '/contact';
        $http.get($url,
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
     
     this.getUserSetting = function(sucessCallback,errorCallback){
         $url = document.URL + '/setting';
         $http.get($url,
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
      
      this.updateUserRejectLogin = function(userId, sucessCallback, errorCallback){
          $url = document.URL + '/reject_login';
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
          $url = document.URL + '/open_login';
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