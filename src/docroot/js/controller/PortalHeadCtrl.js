var config = new Config;
window.HeadCtrl = function($scope, $http) {
    $scope.cart = false;
    $scope.categories = [];
    $('#head-ctrl .preload').removeClass('preload');

    $scope.loadCart = function() {
        $http.get(config.cartService, {cache: false}).success(function(products) {
            $scope.cart = products;
        });
        $scope.loadCart = new Function;
    };

    $scope.loadCart();

    $scope.loadCategories = function() {
        $http.get(config.categoryService, {cache: false}).success(function(categories) {
            $scope.categories = categories;
        });
        $scope.loadCategories = new Function;
    };
    
    $scope.changeLanguage = function(languageKey){
        commonServiceClient = new CommonServiceClient($http);
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
HeadCtrl.$inject = ['$scope', '$http'];

$(function() {
    jQuery('.dropdown.dropdown-hover').hover(function() {
        jQuery(this).find('.dropdown-menu').stop(true, true).show();
        jQuery(this).addClass('open');
    }, function() {
        jQuery(this).find('.dropdown-menu').stop(true, true).hide();
        jQuery(this).removeClass('open');
    });
});