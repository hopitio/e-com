'use strict';

(function() {
    var cnf = new Config;

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
            var limit = cnf.language === 'KO-KR' ? 10 : 20;
            scope.product.name = scope.product.name.length < limit ? scope.product.name : scope.product.name.substr(0, limit) + '...';
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
            var limit = cnf.language === 'KO-KR' ? 18 : 35;
            scope.product.name = scope.product.name.length < limit ? scope.product.name : scope.product.name.substr(0, limit) + '...';
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
            var limit = cnf.language === 'KO-KR' ? 12 : 25;
            scope.product.name = scope.product.name.length < limit ? scope.product.name : scope.product.name.substr(0, limit) + '...';
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
})(Config);
