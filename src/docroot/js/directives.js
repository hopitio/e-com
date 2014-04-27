'use strict';

/* directives */

var directive = angular.module('lynx.directives', ['ui']);//to use angular-ui lib
directive.
    directive('appVersion', ['version', function (version) {
    return function (scope, elm, attrs) {
        elm.text(version);
    };
}]);

angular.module('lynx', []).
    directive('product', function () {
    
		return {
			templateURL: '/js/directives/product.html',
			scope: {
				product: '='
			}
		};
});
	
angular.module('lynx', []).
    directive('shit', function () {
    
		return {
			template: '121212121212',
			scope: {
				product: '='
			}
		};
});