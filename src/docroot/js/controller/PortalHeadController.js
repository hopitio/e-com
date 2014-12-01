function PortalHeadController($scope, $http) {
    $scope.changeLanguage = function(languageKey){
        commonServiceClient = new PortalCommonServiceClient($http);
        commonServiceClient.updateLanguage(languageKey, updateLanguageSucessCallback, updateLanguageErrorCallback);
    }
    
    function updateLanguageSucessCallback(result)
    {
        if(result.isError){
            
        }else{
            location.reload();
        }
    }
    
    function updateLanguageErrorCallback(xhr,status){
        
    }
};
PortalHeadController.$inject = ['$scope', '$http'];