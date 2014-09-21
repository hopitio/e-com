angular.module('lynx').controller('productDetailsCtrl', ['$scope', '$timeout', function($scope, $timeout) {
        $scope.productID = scriptData.productID;
        $scope.relatedProducts = [[]];
        $scope.activeSlide = 0;

        for (var i in scriptData.relatedProducts) {
            var currentRow = $scope.relatedProducts.length - 1;
            var product = scriptData.relatedProducts[i];
            if ($scope.relatedProducts[currentRow].length === 5) {
                $scope.relatedProducts.push([]);
                currentRow++;
            }
            $scope.relatedProducts[currentRow].push(product);
        }

        $scope.shareFacbook = function() {
//        var src = $(".lynx_productImageContainer .lynx_image img").attr('src').replace('..', '');
//        var picturePro = window.location.protocol + window.location.hostname + src;
            FB.ui(
                    {
                        method: 'feed',
                        name: scriptData.productName,
                        caption: scriptData.productPrice,
                        description: scriptData.productDesc,
                        link: document.URL,
                        picture: scriptData.facebookImage
                    },
            function(response) {
                var res = response;
            }
            );
        };
    }]);



$(document).ready(function() {
    loadComment(document, 'script', 'facebook-jssdk');
    $('.detail-main-left li a').click(function() {
        $('.zoomThumbActive').removeClass('zoomThumbActive');
        $(this).parent().addClass('zoomThumbActive');
    });
});
$(function() {
    var container = $('.lynx-tabs');
    $('.lynx-tabs > ul > li > a').each(function() {
        var $a = $(this);
        $a.click(function(e) {
            e.preventDefault();
            $('li.active', container).removeClass('active');
            $a.parent().addClass('active');
            $('.lynx-pane.active', container).removeClass('active');
            $($a.attr('href')).addClass('active');
        });
    });
});
$(function() {
    $('.jqzoom').jqzoom({
        zoomWidth: 400,
        zoomHeight: 300,
        zoomType: 'innerzoom'
    });
});
$(function() {
    $('#frmAddTo').on('click', '[data-type=button]', function() {
        var btn = this;
        var form = this.form;
        form.action = btn.getAttribute('data-action');
        form.submit();
    });
});

//$(function() {
//    var divSummaries = $('.detail-summaries:first');
//    var top = divSummaries.offset().top;
//    var cls;
//    $(document).scroll(function() {
//        if ($(this).scrollTop() >= top - 10) {
//            if (!cls) {
//                divSummaries.addClass('fixed-top')
//                cls = true;
//            }
//        } else {
//            if (cls) {
//                divSummaries.removeClass('fixed-top');
//                cls = false;
//            }
//        }
//    });
//});

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

