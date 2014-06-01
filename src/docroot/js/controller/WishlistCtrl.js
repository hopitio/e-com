(function(window, $, scriptData, undefined) {
    window.showWishlistController = function($scope, $http) {
        $scope.products = [];
        $scope.undo;
        $scope.fnMoneyToString = scriptData.fnMoneyToString;

        function getWishlistDetail() {
            $http.get(scriptData.detailServiceURL, {cache: false}).success(function(wislistDetails) {
                $scope.products = wislistDetails;
            }).error(function() {
                //Todo
            });
        }
        getWishlistDetail();

        $scope.addToCart = function(detailID) {
            $http.get(scriptData.addToCartURL + detailID, {cache: false}).success(function() {
                getWishlistDetail();
            }).error(function() {
                //TODO
            });
        };

        $scope.remove = function(detailID) {
            $http.get(scriptData.removeURL + detailID, {cache: false}).success(function() {
                getWishlistDetail();
                $scope.undo = detailID;
            }).error(function() {
                //TODO
            });
        };

        $scope.undoRemove = function() {
            $http.get(scriptData.undoURL + $scope.undo, {cache: false}).success(function() {
                getWishlistDetail();
                $scope.undo = null;
            }).error(function() {
                //TODO
            });
        };
    };
})(window, $, window.scriptData);