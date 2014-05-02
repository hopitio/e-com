function CommonServiceClient($http)
{
    this.updateLanguage = function(langKey,sucessCallback,errorCallback)
    {
        $http.post('/language/submit_change',
                $.param({languageKey:langKey}),
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