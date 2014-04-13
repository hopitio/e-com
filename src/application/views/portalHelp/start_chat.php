<?php
defined('BASEPATH') or die('no direct script access allowed');
?>
<a href="javascript:;" onclick="window.close();">x</a>
<div ng-app="helpModule" ng-controller="chatCtrl">
    <div ng-if="error">
        Your chat session has encountered some error. Please close this window and retry later!
    </div>
    <div>
        <ul>
            <li ng-repeat="message in messages track by $index">
                {{message.body}}
            </li>
        </ul>
        <div>
            <textarea ng-model="typing"></textarea>
            <a href="javascript:;" ng-click="sendMessage()">Send</a>
        </div>
    </div>
</div>
<script>
    var scriptData = {};
    scriptData.formData = <?php echo json_encode($formData) ?>;
    scriptData.serviceURL = 'http://localhost:9090/chat?token=123';
    scriptData.retryInterval = 10000;
    scriptData.retryTime = 3;
</script>

<script>
    (function(window, $, angular, io, scriptData) {
        angular.module('helpModule', [])
                .factory('$chat', chatFactory);

        function chatFactory($rootScope) {
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
                if (!callback) {
                    exports.socket.emit(event, data);
                } else {
                    exports.socket.emit(event, data, function() {
                        var args = arguments;
                        $rootScope.$apply(function() {
                            callback.apply(exports.socket, args);
                        });
                    });
                }
            }; //function

            return exports;
        }
    })(window, $, angular, io, scriptData);

    (function(window, $, Math, scriptData) {
        window.chatCtrl = function($scope, $chat) {
            $scope.typing;
            $scope.messages = [];
            $scope.error;

            var onConnect = function() {
                runOnce();
                onConnect = runAlways;

                function runOnce() {
                    $chat.on('auth-success', onAuthSuccess);
                    $chat.on('presence', onPresence);
                    $chat.on('chat-message', onChatMessage);
                    $chat.on('error', onError);

                    function onAuthSuccess() {
                        var data = {
                            other: {formData: scriptData.formData}
                        };
                        $chat.emit('presence', data);
                    }

                    function onPresence(data) {

                    }

                    function onChatMessage(message) {
                        $scope.messages.push(message);
                    }

                    function onError(data) {
                        console.error(data);
                        $scope.error = true;
                    }
                }

                function runAlways() {

                }
            }; //onConnect

            $chat.connect(scriptData.serviceURL, onConnect);

            $scope.sendMessage = function() {
                var message = {
                    body: $scope.typing
                };
                $scope.messages.push(message);
                $scope.typing = null;
                $chat.emit('chat-message', message);
            };
        };
    })(window, $, Math, scriptData);
</script>
