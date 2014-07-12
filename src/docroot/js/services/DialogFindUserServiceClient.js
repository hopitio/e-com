function DialogFindUserServiceClient($http){

    this.getFindingAccount = function(id,account,fristname,lastname,limit,offset,sucessCallback,errorCallback)
    {
        account = encodeURIComponent(account);
        fristname = encodeURIComponent(fristname);
        lastname = encodeURIComponent(lastname);
        id = encodeURIComponent(id);
        $http.get('portal/api/user/find?account='+account+
                                           '&id='+id+
                                           '&lastname='+lastname+
                                           '&fristname='+fristname+
                                           '&limit='+limit+
                                           '&offset='+offset,
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