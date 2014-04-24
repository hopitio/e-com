var config = new Config;
window.SortController = function($scope, $http) {
    $scope.items = [
        "The first choice!",
        "And another choice for you.",
        "but wait! A third!"
    ];
    $scope.categories = [];
    $('#sort-controller .preload').removeClass('preload');

    $scope.loadCategories = function() {
        $http.get(config.categoryService, {cache: false}).success(function(categories) {
            $scope.categories = categories;
        });
        $scope.loadCategories = new Function;
    };
};
SortController.$inject = ['$scope', '$http'];