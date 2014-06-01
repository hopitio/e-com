'use strict';

/* directives */
lynxApp.directive('product', function() {
    function link(scope, elem, attr) {
        $('.lynx_item_pin', elem).click(function() {
            $.ajax({
                cache: false,
                url: 'pin/pinProduct/' + scope.product.id,
                success: function() {
                    //todo
                },
                error: function() {
                    //todo
                }
            });
        });
    }
    return {
        link: link,
        templateUrl: '/js/directives/product.html',
        scope: {
            product: '='
        }
    };
});
