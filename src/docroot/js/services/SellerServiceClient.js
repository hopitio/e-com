function SellerServiceClient($http){
    
    this.getSeller = function(userid,shopName,limit,offset,sucessCallback,errorCallback)
    {
        userid = encodeURIComponent(userid == undefined ? "" : userid);
        shopName = encodeURIComponent(shopName == undefined ? "" : shopName);
        limit = encodeURIComponent(limit);
        offset = encodeURIComponent(offset);
        $http.get('/api/__admin/seller/find?account_id='+userid+'&shop_name='+shopName+
                                        '&limit='+limit+'&offset='+offset,
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
    
    this.changeStatus = function(sellerid,status,sucessCallback,errorCallback)
    {
        $http.get('/api/__admin/seller/change_status/'+sellerid+'?status='+status,
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
    
    
    
    
    
    this.getGiftUserById = function(id,sucessCallback,errorCallback)
    {
        $http.get('/api/__admin/user/'+id,
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

    this.uploadFile = function(file,sucessCallback,errorCallback){
        var formData = new FormData();
        formData.append('file',file);
        $http.post('/api/__admin/seller/upload_image', formData, 
        {
            headers: {'Content-Type': 'multipart/form-data'},
            transformRequest: angular.identity
        }
        )
        .success(function(data){
            if(typeof sucessCallback === 'function'){
                sucessCallback(data);
            }
        }).error(function(xhr, status, error){
            if(typeof errorCallback === 'function'){
                errorCallback(xhr,status);
            }
        });
    };
    
    this.getFindingAccountById = function(id,sucessCallback,errorCallback)
    {
        $http.get('/portal/api/user/find?id='+id,
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
    
    this.getFindingAccountThenCallback = function(account, thenFunction){
       var search = encodeURIComponent(account);
       return $http.get('/portal/api/user/find?account='+search,{headers:{"If-Modified-Since":"Thu,01 Jun 1970 00:00:00 GMT"}}
              ).then(function(data){
                  if(typeof thenFunction === 'function'){
                     return thenFunction(data);
                  }
              });
    };
    
}