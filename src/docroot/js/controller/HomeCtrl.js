(function(window, $, scriptData) {
    window.HomeCtrl = function($scope, $http) {
        $scope.hotItemTabs = scriptData.hotItemTabs;
        $scope.activeHotTab = 0;
        $('#home-ctrl .preload').removeClass('preload');

        $scope.setHotTab = function(index) {
            $scope.activeHotTab = index;
        };
        
        $scope.isHotTabActive = function(index){
            return ($scope.activeHotTab == index);
        };
    };

})(window, $, new scriptData);


