(function(window, $, scriptData) {
    window.ListCtrl = function($scope, $http, $timeout) {
        $scope.page = window.location.hash ? parseInt(window.location.hash.replace('#/page', '')) : 1;
        $scope.pageSize = 20;
        $scope.products = [];
        $scope.totalRecord;
        $scope.additionalParams = scriptData.additionalParams || {};
        $scope.getProductsRequest;
        $scope.hasSectionImage = scriptData.hasSectionImage;
        $scope.showBtnNext = false;

        $scope.caculatePaging = function() {
            var ret = {offset: ($scope.page - 1) * $scope.pageSize, limit: $scope.pageSize};
            if ($scope.page == 1 && $scope.hasSectionImage)
                ret.limit -= 2;
            if ($scope.page > 1 && $scope.hasSectionImage)
                ret.offset -= 2;
            return ret;
        };

        $scope.getProducts = function() {
            $scope.products = [];
            var paging = $scope.caculatePaging();
            var params = {limit: paging.limit, offset: paging.offsett};
            for (var pname in $scope.additionalParams) {
                params[pname] = $scope.additionalParams[pname];
            }
            if ($scope.getProductsRequest) {
                $scope.getProductsRequest.abort();
                $scope.getProductsRequest = null;
            }
            $scope.getProductsRequest = $.ajax({
                cache: false,
                url: scriptData.productURL,
                data: params,
                success: function(resp) {
                    $scope.products = resp.products;
                    $scope.totalRecord = resp.totalRecord;
                    $scope.getProductsRequest = null;
                    if ($scope.totalRecord > $scope.page * $scope.pageSize)
                        $scope.showBtnNext = true;
                    else
                        $scope.showBtnNext = false;
                    setTimeout(function() {
                        $scope.$apply();
                    });
                }, error: function() {
                    //TODO
                    $scope.getProductsRequest = null;
                    setTimeout(function() {
                        $scope.$apply();
                    });
                }
            });
        };
        $scope.getProducts();

        $scope.nextPage = function() {
            $scope.page++;
            window.location.hash = 'page' + $scope.page;
            $scope.getProducts();
        };

    };
})(window, $, scriptData);