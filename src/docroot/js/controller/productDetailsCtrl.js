function productDetailsCtrl($scope, $http) {
    $scope.productImages = scriptData.images;
    $scope.selectedImage = 0;
    $scope.productID = scriptData.productID;
    $scope.relatedService = scriptData.relatedURL;
    $scope.relatedProducts;

    $scope.isImageSelected = function(index) {
        return (index == $scope.selectedImage);
    };

    $scope.selectImage = function(index) {
        $scope.selectedImage = index;
    };

    $scope.getRelatedProducts = function() {
        $http.get($scope.relatedService + $scope.productID).success(function(products) {
            $scope.relatedProducts = products;
        });
    };
    $scope.getRelatedProducts();
}
