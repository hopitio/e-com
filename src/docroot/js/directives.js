
(function (Config) {
    var cnf = new Config;

    function generateUUID() {
        var d = new Date().getTime();
        var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
            var r = (d + Math.random() * 16) % 16 | 0;
            d = Math.floor(d / 16);
            return (c == 'x' ? r : (r & 0x7 | 0x8)).toString(16);
        });
        return uuid;
    }

    /* directives */
    lynxApp.directive('ngProductSmall', function () {
        function link(scope, elem, attr) {
            var limit = cnf.language === 'KO-KR' ? 10 : 20;
            var img_container = $('.image:first', elem);

            var img = document.createElement('img');
            var src = '/thumbnail.php/' + scope.product.thumbnail + '/w=168';

            img.src = src;
            img.onload = function () {
                if (img.width > img.height) {
                    img.style.width = '100%';
                } else {
                    img.style.height = '100%';
                }
                img.onload = null;
                $('.img-loading', img_container).remove();
                img_container.append(img);
            };
        }
        return {
            link: link,
            templateUrl: '/js/directives/producta.html',
            scope: {
                'product': '=ngProductSmall'
            }
        };
    }).directive('ngProductLarge', function () {
        function link(scope, elem, attr) {
            var limit = cnf.language === 'KO-KR' ? 18 : 35;
            var img_container = $('.image:first', elem);

            var img = document.createElement('img');
            var src = '/thumbnail.php/' + scope.product.thumbnail + '/w=280';

            img.src = src;
            img.onload = function () {
                if (img.width > img.height) {
                    img.style.width = '100%';
                } else {
                    img.style.height = '100%';
                }
                img.onload = null;
                $('.img-loading', img_container).remove();
                img_container.append(img);
            };

            

        }
        return {
            link: link,
            templateUrl: '/js/directives/producta.html',
            scope: {
                'product': '=ngProductLarge'
            }
        };
    }).directive('ngProductMedium', function () {
        function link(scope, elem, attr) {
            var limit = cnf.language === 'KO-KR' ? 18 : 35;
            var img_container = $('.image:first', elem);

            var img = document.createElement('img');
            var src = '/thumbnail.php/' + scope.product.thumbnail + '/w=200';

            img.src = src;
            img.onload = function () {
                if (img.width > img.height) {
                    img.style.width = '100%';
                } else {
                    img.style.height = '100%';
                }
                img.onload = null;
                $('.img-loading', img_container).remove();
                img_container.append(img);
            };
        }
        return {
            link: link,
            templateUrl: '/js/directives/producta.html',
            scope: {
                'product': '=ngProductMedium'
            }
        };
    });
})(typeof Config !== 'undefined' ? Config : new Function);
