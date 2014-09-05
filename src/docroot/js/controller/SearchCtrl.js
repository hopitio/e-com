function SearchCtrl($scope, $http) {
    $scope.productRows = [[]];
    $scope.total_record = 0;
    $scope.limit;
    $scope.offset;

    function getProducts() {
        var params = {
            offset: $scope.offset,
            kw: scriptData.keywords
        };
        $http.get('/search/getProductService', {cache: false, params: params}).success(function(data) {
            $scope.total_record = data.total_record;
            $scope.offset += data.products.length;
            var currentPage = $scope.productRows.length - 1;
            for (var i in data.products) {
                var product = data.products[i];
                if ($scope.productRows[currentPage].length == 4) {
                    $scope.productRows.push([]);
                    currentPage++;
                }
                $scope.productRows[currentPage].push(product);
            }
        }).error(function() {
            //todo
        });
    }
    getProducts();

}