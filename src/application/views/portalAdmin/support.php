<?php
defined('BASEPATH') or die('no direct script access allowed');
?>
<div ng-app="supportModule" ng-controller="portalAdminSupportCtrl">
    <div ng-repeat="customer in customers track by $index">
        <div>{{customer.fullname}}</div>
        <ul>
            <li ng-repeat="message in customer.messages track by $index">{{message.userFullname}}: {{message.body}}</li>
        </ul>
        <div>
            <textarea ng-model="customer.typing"></textarea>
            <a href="javascript:;" ng-click="sendMessage(customer)">Send</a>
        </div>
    </div>
</div>
<script>
    var scriptData = {};
    scriptData.supportServiceURL = 'http://localhost:9090/support?token=123';
    scriptData.userFullname = '<?php echo User::getCurrentUser()->getFullname(); ?>';
</script>
<script>
    (function(window, $, angular, io, scriptData, undefined) {
        angular.module('supportModule', []).factory('$support', supportFactory);
        function supportFactory($rootScope) {
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

            exports.getSocketID = function(){
                return exports.socket.socket.sessionid;
            };
            
            return exports;
        } //function
    })(window, $, angular, io, scriptData);
    (function(window, $, scriptData, undefined) {
        window.portalAdminSupportCtrl = function($scope, $http, $support) {
            $scope.customers = {};
            //socketio
            var onChatConnected = function() {
                runOnce();
                onChatConnected = runAlways;
                function runOnce() {
                    $support.on('disconnect', onDisconnect);
                    $support.on('error', onError);
                    $support.on('presence', onPresence);
                    $support.on('chat-message', onChatMessage);
                    function onPresence(customerData) {
                        var customer = customerData;
                        customer.messages = [];
                        customer.typing;
                        $scope.customers[customerData.from] = customer;
                        $support.emit('presence', {to: customerData.from, fullname: scriptData.userFullname});
                    } //function

                    function onChatMessage(message) {
                        var customerData = $scope.customers[message.from];
                        if (customerData) {
                            customerData.messages.push(message);
                        }
                    } //function

                    function onDisconnect() {
                        console.info('Disconnected from support');
                    }

                    function onError(data) {
                        console.info('Error', data);
                    }
                }

                function runAlways() {

                }

            }; //onChatConnected
            $support.connect(scriptData.supportServiceURL, onChatConnected);
            $scope.sendMessage = function(customer) {
                var message = {
                    body: customer.typing,
                    to: customer.from,
                    userFullname: scriptData.userFullname
                };
                customer.typing = null;
                customer.messages.push(message);
                $support.emit('chat-message', message);
            };
            
        }; //controller

    })(window, $, scriptData);
</script>