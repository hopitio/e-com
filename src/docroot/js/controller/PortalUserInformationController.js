function PortalUserInformationController($scope,$http)
{
    $scope.onLoadUserInformation = false; 
    $scope.userInformationError = undefined;
    $scope.userInformationSucess = undefined;
    $scope.onLoadUserContact = false;
    $scope.userContactError = undefined;
    $scope.userContactSucess = undefined;
    $('input[data-provide=datepicker]').datepicker();
    
    
    var modalInstance;
    $scope.getUserInformation = function(){
        portalUserInformationServiceClient = new PortalUserInformationServiceClient($http);
        portalUserInformationServiceClient.getUserInformation(getUserInformationSucessCallback,getUserInormationErrorCallback);
        $scope.onLoadUserInformation = true;
    };
    
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
    };
     
    $scope.updateInformation = function(){
        var d1 = new Date($scope.warpDate);
        //$scope.userInformation.dob = d1.yyyymmdd() + ' 00:00:00';
        
        portalUserInformationServiceClient = new PortalUserInformationServiceClient($http);
        portalUserInformationServiceClient.updateUserInformation($scope.userInformation,updateUserInformationSucessCallback,updateUserInformationErrorCallback);
        $scope.onLoadUserInformation = true;
    };
    
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
    
    $scope.getUserContacts = function(){
        portalUserInformationServiceClient = new PortalUserInformationServiceClient($http);
        portalUserInformationServiceClient.getUserContacts(getUserContactSucessCallback,getUserContactErrorCallback);
        $scope.onLoadUserContact = true;
    };
    
    function getUserContactSucessCallback(result){
        $scope.onLoadUserContact = false;
        if(result.isError){
            $scope.userContactError = result.errorMessage;
        }else{
            $scope.userContacts = result.data;
        }
    }
    function getUserContactErrorCallback(xhr,status){
        $scope.onLoadUserContact = false;
    }
    
    $scope.openModalContactDialog = function(item){
        modalInstance = $modal.open({
                        templateUrl: 'ModalContactDialog.html',
                        controller: ModalContactDialog,
                        resolve: {
                            item:function () {
                                return item;
                            }
                        }
                    });
        modalInstance.result.then(function () {
            $scope.getUserContacts();
          }, function () {});
    };

    $scope.getUserInformation();
    $scope.getUserContacts();
    
    
}

var ModalContactDialog = function ($scope, $http, $modalInstance, item)
{
    $scope.contact = item;
    if(item == undefined){
        $scope.contact = {};
        $scope.contact.id = null;
        $scope.contact.full_name = '';
        $scope.contact.telephone = '';
        $scope.contact.state_province = '';
        $scope.contact.city_district = '';
        $scope.contact.street_address = '';
    }
    $scope.onLoadContact = false;
    $scope.updateContactError = undefined;
    $scope.updateContactSucess = undefined;
    
    $scope.ok = function () {
        portalUserInformationServiceClient = new PortalUserInformationServiceClient($http);
        portalUserInformationServiceClient.saveContact($scope.contact,updateUserContactSucessCallback,updateUserContactErrorCallback);
        $scope.onLoadContact = true;
      };
      
    function updateUserContactSucessCallback(result){
        $scope.onLoadContact = false;
        if(result.isError){
            $scope.updateContactError = result.errorMessage;
        }else{
            $scope.updateContactSucess = result.data.msg;
        }
    }
    
    function updateUserContactErrorCallback(xhr,state){
        $scope.onLoadContact = false;
        
    }
    
    $scope.closeAlertSaveContact = function(type){
        if(type == 'error'){
            $scope.updateContactError = undefined;
        }else{
            $scope.updateContactSucess = undefined;
        }
    }
    
    $scope.cancel = function () {
        $modalInstance.close();
    };
    
}
PortalUserInformationController.$inject = ['$scope','$http'];

