'use strict';

/* directives */
lynxApp.directive('product', function() {
    function link(scope, elem, attr) {
        $('.lynx_item_pin', elem).click(function() {
            showAjaxModal('Product Pinned', '/pin/pinProduct/' + scope.product.id);
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
