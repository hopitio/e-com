function productDetailsCtrl($scope, $http, $timeout) {
    $scope.productID = scriptData.productID;
    $scope.relatedService = scriptData.relatedURL;
    $scope.relatedProducts;

    $scope.isImageSelected = function(index) {
        return (index == $scope.selectedImage);
    };

    $scope.getRelatedProducts = function() {
        $http.get($scope.relatedService + $scope.productID).success(function(products) {
            $scope.relatedProducts = products;
            $timeout(function() {
                productSlider('.lynx_hotProducts');
            });
        });
    };
    $scope.getRelatedProducts();

    $scope.shareFacbook = function() {
        var productName = $(".lynx_productImageHead .lynx_title").text();
        var caption = $(".lynx_productChoicePannel .lynx_productPrice").text();
        var des = $(".lynx_productDetailDescription").text();
        var src = $(".lynx_productImageContainer .lynx_image img").attr('src').replace('..', '');
        var picturePro = window.location.protocol + window.location.hostname + src;
        FB.ui(
                {
                    method: 'feed',
                    name: productName,
                    caption: caption,
                    description: des,
                    link: document.URL,
                    picture: $facebookImageUrl
                },
                function(response) {
                    var res = response;
                }
        );
    }
}


$(document).ready(function() {
    loadComment(document, 'script', 'facebook-jssdk');
});

function loadComment(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=" + Window.Config.facebookApplicationKey + "&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
}

