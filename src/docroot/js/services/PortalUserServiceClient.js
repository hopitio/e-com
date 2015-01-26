function PortalUserServiceClient($http)
{
    this.getUserHistory = function(startDate,endDate,limit,offset,sucessCallback,errorCallback){
        $url = '/portal/api/__admin/user/'+user.id+'/history';
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
        $url = '/portal/api/__admin/user/'+user.id+'/contact';
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
         $url = '/portal/api/__admin/user/'+user.id+'/setting';
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
          $url = '/portal/api/__admin/user/'+user.id+'/reject_login';
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
          $url = 'portal/api/account/'+userId+'/order_history_total_order_number';
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
}