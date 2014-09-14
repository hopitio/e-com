'use strict';

(function() {
    var cnf = new Config;

    /* directives */
    lynxApp.directive('ngProductSmall', function() {
        function link(scope, elem, attr) {
            var limit = cnf.language === 'KO-KR' ? 10 : 20;
            var img_container = $('.image:first', elem);

            scope.product.name = scope.product.name.length < limit ? scope.product.name : scope.product.name.substr(0, limit) + '...';

            var img = document.createElement('img');
            img.src = '/thumbnail.php/' + scope.product.thumbnail + '/w=170';
            img.onload = function() {
                if (img.width > img.height) {
                    img.style.width = '100%';
                } else {
                    img.style.height = '100%';
                }
            };
            img_container.append(img);
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
            var img_container = $('.image:first', elem);

            scope.product.name = scope.product.name.length < limit ? scope.product.name : scope.product.name.substr(0, limit) + '...';

            var img = document.createElement('img');
            img.src = '/thumbnail.php/' + scope.product.thumbnail + '/w=280';
            img.onload = function() {
                if (img.width > img.height) {
                    img.style.width = '100%';
                } else {
                    img.style.height = '100%';
                }
            };
            img_container.append(img);
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
            var limit = cnf.language === 'KO-KR' ? 18 : 35;
            var img_container = $('.image:first', elem);
            scope.product.name = scope.product.name.length < limit ? scope.product.name : scope.product.name.substr(0, limit) + '...';

            var img = document.createElement('img');
            img.src = '/thumbnail.php/' + scope.product.thumbnail + '/w=200';
            img.onload = function() {
                if (img.width > img.height) {
                    img.style.width = '100%';
                } else {
                    img.style.height = '100%';
                }
            };
            img_container.append(img);
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
