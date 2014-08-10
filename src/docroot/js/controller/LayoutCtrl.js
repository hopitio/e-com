var config = new Config;
angular.module('lynx').controller('LayoutCtrl', ['$scope', '$http', function($scope, $http) {
        $scope.widgetRightActive = 'viewed';
        $scope.widgetRightPage = 1;
        $scope.widgetRightProducts = {
            'cart': [[]],
            'viewed': [[]]
        };

        $scope.setWidgetRightActive = function(name) {
            $scope.widgetRightActive = name;
        };

        $scope.getCurrentProducts = function() {
            if (!$scope.widgetRightProducts[$scope.widgetRightActive])
                return;
            if (!$scope.widgetRightProducts[$scope.widgetRightActive][$scope.widgetRightPage - 1])
                return;
            return $scope.widgetRightProducts[$scope.widgetRightActive][$scope.widgetRightPage - 1];
        };

        $scope.getViewed = function() {
            $scope.widgetRightProducts.viewed = [[]];
            $http.get('/home/viewed_service').success(function(resp) {
                if (!resp[0] || !resp[0].id)
                    return;
                var currentRow = 0;
                for (var i in resp) {
                    var product = resp[i];
                    if ($scope.widgetRightProducts.viewed[currentRow].length === 3) {
                        $scope.widgetRightProducts.viewed[currentRow].push([]);
                        currentRow++;
                    }
                    $scope.widgetRightProducts.viewed[currentRow].push(product);
                }
            });
        };
        $scope.getViewed();

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

    var widgetRight = $('#widget-right');
    widgetRight.data().top = widgetRight.offset().top;
    $(document).scroll(function() {
        if ($(this).scrollTop() >= widgetRight.data().top - 10) {
            if (!widgetRight.data().cls)
                widgetRight.addClass('fixed-top');
            widgetRight.data().cls = true;
        } else {
            if (widgetRight.data().cls)
                widgetRight.removeClass('fixed-top');
            widgetRight.data().cls = false;
        }
    });
});
