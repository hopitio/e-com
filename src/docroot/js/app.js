'use strict';

/* App Module */
var lynxApp = angular.module('lynx', ['mainFilters', 'ui.bootstrap', 'ngRoute']);
lynxApp.config(['$routeProvider', function($routeProvider) {}]);
lynxApp.factory('$socket', socketService);

function socketService($rootScope) {
    var exports = {
        socket: null,
        connect: null,
        on: null,
        emit: null
    };
    exports.on = function(event, handler) {
        exports.socket.on(event, function() {
            var args = arguments;
            $rootScope.$apply(function() {
                handler.apply(exports.socket, args);
            });
        });
    }; //function

    exports.connect = function(serviceURL, connectHandler) {
        exports.socket = io.connect(serviceURL);
        exports.on('connect', function() {
            connectHandler.apply(exports.socket, arguments);
        });
        return exports.socket;
    }; //function

    exports.emit = function(event, data, callback) {
        exports.socket.emit(event, data, function() {
            var args = arguments;
            if (callback) {
                $rootScope.$apply(function() {
                    callback.apply(exports.socket, args);
                });
            }
        });
    }; //function

    exports.getSocketID = function() {
        return exports.socket.socket.sessionid;
    };
    return exports;
} //function