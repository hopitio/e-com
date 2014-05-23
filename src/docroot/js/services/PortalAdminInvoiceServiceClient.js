function PortalAdminInvoiceServiceClient($http)
{
    
    this.getInvoice = function(invoiceId,sucessCallback,errorCallback)
    {
        $http.get('/portal/api/__admin/invoice/'+invoiceId,
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
    
    this.getProducts = function(invoiceId,sucessCallback,errorCallback)
    {
        $http.get('/portal/api/__admin/invoice/'+invoiceId+'/products',
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
    
    this.getShippings = function(invoiceId,sucessCallback,errorCallback)
    {
        $http.get('/portal/api/__admin/invoice/'+invoiceId+'/shippings',
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
    
    this.getOtherCost = function(invoiceId,sucessCallback,errorCallback)
    {
        $http.get('/portal/api/__admin/invoice/'+invoiceId+'/other_costs',
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
    
    this.getContact = function(contactId,sucessCallback,errorCallback)
    {
        $http.get('/portal/api/__admin/contact/'+contactId,
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