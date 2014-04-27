(function(window, $, scriptData) {
    window.HomeCtrl = function($scope, $http) {
        $scope.activeHotTab = 0;
        $scope.hotItemTabs = scriptData.hotItemTabs;
        $scope.sections = [];

        $('#home-ctrl .preload').removeClass('preload');

        $http.get(scriptData.sectionURL, {cache: false}).success(function(sections) {
            $scope.sections = sections;
        });

        $scope.setHotTab = function(index) {
            $scope.activeHotTab = index;
            var hotConfig = $scope.hotItemTabs[index];
            if (hotConfig.length == 2) {
                hotConfig.push([]);
                $http.get(hotConfig[1], {cache: false}).success(function(products) {
                    for (var i in products)
                        hotConfig[2].push(products[i]);
                });
            }
        };

        $scope.setHotTab(0);

        $scope.isHotTabActive = function(index) {
            return ($scope.activeHotTab == index);
        };
    };

})(window, $, new scriptData);


