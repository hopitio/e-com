<?php
defined('BASEPATH') or die('no direct script access allowed');
?>
<style>
    html{padding:20px 0 40px 0;position: relative;height: 100%;}
    body{height:100%;}
</style>
<h3 class="right" style="position: absolute;right:10px;top: 0;margin:0">
    <a href="javascript:;" onclick="window.close();" title="Close window">Close</a>
</h3>
<div ng-app="lynx" ng-controller="chatCtrl" class="left chatCtrl" style="height: 100%;">
    <ul class="chat-message-container">
        <li ng-if="error">
            Your chat session has encountered some error. Please close this window and retry later!
        </li>
        <li ng-if="!error && supporter">
            You are chatting with {{supporter}}
        </li>
        <li ng-repeat="message in messages track by $index">
            <label ng-class="{'chat-message-you': !message.userName, 'chat-message-other': message.userName}">{{message.userName|| 'You'}}:</label> {{message.body}}
        </li>
    </ul>
    <div class="chat-control">
        <textarea ng-model="typing"></textarea>
        <a href="javascript:;" ng-click="sendMessage()">Send</a>
    </div>
</div>
<script>
    var scriptData = {};
    scriptData.formData = <?php echo json_encode($formData) ?>;
    scriptData.user = <?php echo json_encode(User::getCurrentUser()) ?>;
    scriptData.serviceURL = '<?php echo get_instance()->config->item('socketChatURL') ?>?' + $.param(scriptData.user);
    scriptData.retryInterval = 10000;
    scriptData.retryTime = 3;</script>

<script>
    function chatCtrl($scope, $socket, $timeout) {
        $scope.typing;
        $scope.messages = [];
        $scope.error;
        $scope.user = scriptData.user;
        $scope.supporter;
        var onConnect = function() {
            runOnce();
            onConnect = runAlways;
            function runOnce() {
                $socket.on('auth-success', onAuthSuccess);
                $socket.on('presence', onPresence);
                $socket.on('chat-message', onChatMessage);
                $socket.on('error', onError);
                function onAuthSuccess() {
                    var data = {
                        other: {formData: scriptData.formData}
                    };
                    $socket.emit('presence', data);
                }

                function onPresence(data) {
                    $scope.supporter = data.fullname;
                }

                function onChatMessage(message) {
                    $scope.messages.push(message);
                    scrollBottom();
                }

                function onError(data) {
                    console.error(data);
                    $scope.error = true;
                }
            }

            function runAlways() {

            }
        }; //onConnect

        $socket.connect(scriptData.serviceURL, onConnect);
        $scope.sendMessage = function() {
            if(!$scope.typing)
                return;
            var message = {
                body: $scope.typing
            };
            $scope.messages.push(message);
            $scope.typing = null;
            $socket.emit('chat-message', message);
            scrollBottom();
        };

        function scrollBottom() {
            $timeout(function() {
                $('.chat-message-container').animate({"scrollTop": $('.chat-message-container')[0].scrollHeight});
            });
        }

        $('textarea').keypress(function(e) {
            if (e.keyCode == 13) {
                $scope.sendMessage();
                e.preventDefault();
                return false;
            }
        });
    }
</script>
