'use strict';

/* directives */
lynxApp.directive('ngThumbnail', function() {
    function link(scope, elem, attr) {
        var img = document.createElement('img');
        img.src = scope.src;
        img.onload = function() {
            if (img.width > img.height) {
                img.style.width = '100%';
            } else {
                img.style.height = '100%';
            }
            img.style.display = 'inline-block';
        };
        elem.append(img);
    }
    return {
        link: link,
        scope: {
            'src': '@ngThumbnail'
        }
    };
}).directive('ngProductSmall', function() {
    function link(scope, elem, attr) {
        scope.product.name = scope.product.name.length < 20 ? scope.product.name : scope.product.name.substr(0, 20) + '...';
        scope.product.thumbnail = '/thumbnail.php/' + scope.product.thumbnail + '/w=170';
    }
    return {
        link: link,
        templateUrl: '/js/directives/producta.html',
        scope: {
            'product': '=ngProductSmall'
        }
    };
}).directive('ngProductLarge', function() {
    function link(scope, elem, attr) {
        scope.product.name = scope.product.name.length < 20 ? scope.product.name : scope.product.name.substr(0, 20) + '...';
        scope.product.thumbnail = '/thumbnail.php/' + scope.product.thumbnail + '/w=280';
    }
    return {
        link: link,
        templateUrl: '/js/directives/producta.html',
        scope: {
            'product': '=ngProductLarge'
        }
    };
}).directive('ngProductMedium', function() {
    function link(scope, elem, attr) {
        scope.product.name = scope.product.name.length < 20 ? scope.product.name : scope.product.name.substr(0, 20) + '...';
        scope.product.thumbnail = '/thumbnail.php/' + scope.product.thumbnail + '/w=200';
    }
    return {
        link: link,
        templateUrl: '/js/directives/producta.html',
        scope: {
            'product': '=ngProductMedium'
        }
    };
});
