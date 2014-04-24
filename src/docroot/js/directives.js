'use strict';

/* directives */

var directive = angular.module('lynx.directives', ['ui']);//to use angular-ui lib
directive.
    directive('appVersion', ['version', function (version) {
    return function (scope, elm, attrs) {
        elm.text(version);
    };
}]);