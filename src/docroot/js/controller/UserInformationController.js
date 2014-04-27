function UserInformationController($scope,$http)
{
    $scope.onLoadUserInformation = false; 
    $scope.userInformationError = undefined;
    $scope.userInformationSucess = undefined;
    
    
    $scope.getUserInformation = function(){
        userInformationServiceClient = new UserInformationServiceClient($http);
        userInformationServiceClient.getUserInformation(getUserInformationSucessCallback,getUserInormationErrorCallback);
        $scope.onLoadUserInformation = true;
    }
    
    function getUserInformationSucessCallback(result){
        $scope.onLoadUserInformation = false;
        if(result.isError){
            $scope.userInformationError =  result.errorMessage;
        }else{
            $scope.userInformation = result.data.userInformation;
            $scope.warpDate = $scope.userInformation.dob;
            $scope.sexCollection = result.data.sexCollection;
        }
    }
    function getUserInormationErrorCallback(xhr,status){
        $scope.onLoadUserInformation = false;
    }
    
    $scope.closeAlertUserinformation = function(type){
        if(type == 'error'){
            $scope.userInformationError = undefined;
        }else{
            $scope.userInformationSucess = undefined;
        }
    }
    Date.prototype.yyyymmdd = function() {
        var yyyy = this.getFullYear().toString();
        var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
        var dd  = this.getDate().toString();
        return yyyy + '-' + (mm[1]?mm:"0"+mm[0]) +'-'+ (dd[1]?dd:"0"+dd[0]); // padding
       };
     
    $scope.updateInformation = function(){
        var d1 = new Date($scope.warpDate);
        $scope.userInformation.dob = d1.yyyymmdd() + ' 00:00:00';
        
        userInformationServiceClient = new UserInformationServiceClient($http);
        userInformationServiceClient.updateUserInformation($scope.userInformation,updateUserInformationSucessCallback,updateUserInformationErrorCallback);
        $scope.onLoadUserInformation = true;
    }
    
    function updateUserInformationSucessCallback(result){
        $scope.onLoadUserInformation = false;
        if(result.isError){
            $scope.userInformationError =  result.errorMessage;
        }else{
            $scope.userInformationSucess =  result.data.msg;
        }
    }
    
    function updateUserInformationErrorCallback(result){
        $scope.onLoadUserInformation = false;
    }
    
    
    
    $scope.getUserInformation();
}
UserInformationController.$inject = ['$scope','$http'];