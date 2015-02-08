function PortalUserSecurityAccountController($scope,$http)
{
   $scope.onUpdatingPassword = false;
   $scope.onUpdatingEmail = false;
   $scope.onGetHistory = false;
   $scope.token;
   $scope.updatePassword = function(){
       userSecurityServiceClient =  new PortalUserSecurityServiceClient($http);
       var token = AppCommon.getParameterByName("token");
       
       if(token == undefined || token == ''){
    	   oldPass = $scope.oldPass;
       } else{
    	   oldPass = token;
       }
       
       newPass = $scope.newPass;
       comfrimPass = $scope.newComfirmPass;
       userSecurityServiceClient.updatePassword(oldPass,newPass,comfrimPass,updatePasswordSusscessCallback,updatePassowrdErrorCallback);
       $scope.onUpdatingPassword = true; 
   };
   
   function updatePasswordSusscessCallback(result){
       $scope.onUpdatingPassword = false;
       if(result.isError){
           $scope.susscessMessage = undefined;
           $scope.errorMessage = result.errorMessage;
       }else{
           $scope.errorMessage = undefined;
           $scope.susscessMessage = result.data['completeMsg'];
       }
   }
   
   function updatePassowrdErrorCallback(xhr,httpStatus){
       $scope.onUpdatingPassword = false;
   }
   
   $scope.closeAlertPassword = function(type){
       if(type == "error"){
           $scope.errorMessage = undefined;
       }else{
           $scope.susscessMessage = undefined;
       }
   }
   
   $scope.updateAlertEmail = function(){
       userSecurityServiceClient =  new PortalUserSecurityServiceClient($http);
       userSecurityServiceClient.updateAlertEmail($scope.email,updateAlertEmailSusscessCallback,updateAlertEmailErrorCallback);
       $scope.onUpdatingEmail = true;
   }
   
   function updateAlertEmailSusscessCallback(result){
       $scope.onUpdatingEmail = false;
       if(result.isError){
           $scope.alertEmailError = result.errorMessage;
       }else{
           $scope.alertEmailSusscess = result.data['completeMsg'];
           //TODO: Tính năng chưa phát triển
       }
   }
   
   function updateAlertEmailErrorCallback(xhr,status){
       $scope.onUpdatingEmail = false;
   }
   
   $scope.closeAlertEmailNotify = function(type){
       if(type == "error"){
           $scope.alertEmailError = undefined;
       }else{
           $scope.alertEmailSusscess = undefined;
       }
   };
   
   $scope.showHistory = function(){
       userSecurityServiceClient =  new PortalUserSecurityServiceClient($http);
       userSecurityServiceClient.getUserLoginHistory(10,getHistorySucessCallback,getHistoryErrorCallback);
       $scope.onGetHistory = true;
   };
   
   function getHistorySucessCallback(result){
       $scope.onGetHistory = false;
       $scope.historys = result.data;
   }
   
   function getHistoryErrorCallback(xhr,status){
       $scope.onGetHistory = false;
   }
   
   $scope.showHistory();
   
}
PortalUserSecurityAccountController.$inject = ['$scope','$http'];