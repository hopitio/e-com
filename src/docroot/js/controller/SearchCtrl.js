function SearchCtrl($scope, $http) {
    $scope.products = [];
    $scope.total_record = 0;
    $scope.limit;
    $scope.page_nav = [];
    $scope.total_page;

    $scope.getCurrentPage = function() {
        var page = parseInt(window.location.hash.replace('#/p=', ''));
        if (!page)
            page = 1;
        return page;
    };

    $scope.setCurrentPage = function(number) {
        window.location.hash = 'p=' + number;
        getProducts(number);
    };

    function range(start, end) {
        var arr = [];
        for (var i = start; i <= end; i++) {
            arr.push(i);
        }
        return arr;
    }

    function getProducts(page) {
        var params = {
            p: page
        };
        $http.get(scriptData.serviceURL, {cache: false, params: params}).success(function(data) {
            $scope.products = data.products;
            $scope.total_record = data.total_record;
            $scope.limit = data.limit;
            $scope.total_page = Math.ceil($scope.total_record / $scope.limit);
            if (!$scope.total_page)
                $scope.total_page = 1;
            var expected_nav = 6;
            var start_page = $scope.getCurrentPage() - 3;
            var end_page = $scope.getCurrentPage() + 2;
            //tinh toan page
            if (expected_nav > $scope.total_page) {
                $scope.page_nav = range(1, $scope.total_page);
            }
            else if (start_page <= 0) {
                $scope.page_nav = range(1, 6);
            }
            else if (end_page > $scope.total_page) {
                $scope.page_nav = range($scope.total_page - 5, $scope.total_page);
            }
            else {
                $scope.page_nav = range(start_page, end_page);
            }
        }).error(function() {
            //todo
        });
    }
    getProducts($scope.getCurrentPage());

}