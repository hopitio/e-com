var config = new Config;
angular.module('lynx').controller('LayoutCtrl', ['$scope', '$http', function($scope, $http) {
        $scope.changeLanguage = function(languageKey) {
            commonServiceClient = new CommonServiceClient($http);
            commonServiceClient.updateLanguage(languageKey, updateLanguageSucessCallback, updateLanguageErrorCallback);
        };

        function updateLanguageSucessCallback(result)
        {
            if (result.isError) {

            } else {
                location.reload();
            }
        }

        function updateLanguageErrorCallback(xhr, status) {

        }

    }]);

$(function() {
    $('#scroll-to-top').click(function() {
        $('body').animate({'scrollTop': 0});
    });
    $('#scroll-to-bottom').click(function() {
        $('body').animate({'scrollTop': $('body').height()});
    });
});
