'use strict';

(function() {
    var cnf = new Config;

    function generateUUID() {
        var d = new Date().getTime();
        var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = (d + Math.random() * 16) % 16 | 0;
            d = Math.floor(d / 16);
            return (c == 'x' ? r : (r & 0x7 | 0x8)).toString(16);
        });
        return uuid;
    }

    /* directives */
    lynxApp.directive('ngProductSmall', function() {
        function link(scope, elem, attr) {
            var limit = cnf.language === 'KO-KR' ? 10 : 20;
            var img_container = $('.image:first', elem);

            scope.product.name = scope.product.name.length < limit ? scope.product.name : scope.product.name.substr(0, limit) + '...';

            var img = document.createElement('img');
            img_container.append(img);
            $(img).attr('data-src', '/thumbnail.php/' + scope.product.thumbnail + '/w=170')
                    .attr('src', '/images/loading.gif')
                    .attr('id', 'img-' + generateUUID());

            new Blazy({
                selector: '#' + img.id,
                success: function() {
                    if (img.width > img.height) {
                        img.style.width = '100%';
                    } else {
                        img.style.height = '100%';
                    }
                },
                error: function(ele) {
                    ele.src = '';
                }
            });
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
            img_container.append(img);
            $(img).attr('data-src', '/thumbnail.php/' + scope.product.thumbnail + '/w=280')
                    .attr('src', '/images/loading.gif')
                    .attr('id', 'img-' + generateUUID());

            new Blazy({
                selector: '#' + img.id,
                success: function() {
                    if (img.width > img.height) {
                        img.style.width = '100%';
                    } else {
                        img.style.height = '100%';
                    }
                },
                error: function(ele) {
                    ele.src = '';
                }
            });
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
            img_container.append(img);
            $(img).attr('data-src', '/thumbnail.php/' + scope.product.thumbnail + '/w=200')
                    .attr('src', '/images/loading.gif')
                    .attr('id', 'img-' + generateUUID());

            new Blazy({
                selector: '#' + img.id,
                success: function(ele) {
                    if (ele.width > ele.height) {
                        ele.style.width = '100%';
                    } else {
                        ele.style.height = '100%';
                    }
                },
                error: function(ele) {
                    ele.src = '';
                }
            });
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
