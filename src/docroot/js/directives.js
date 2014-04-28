'use strict';

/* directives */
lynxApp.directive('product', function () {
		return {
		    templateUrl: 'js/directives/product.html',
			scope: {
				product: '='
			}
		};
});
	
lynxApp.directive('shit', function () {
		return {
			template: '121212121212',
			scope: {
				product: '='
			}
		};
});