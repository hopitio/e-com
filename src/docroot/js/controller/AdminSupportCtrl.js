

function portalAdminSupportCtrl($scope, $http, $socket, $timeout) {
    $scope.customers = {};
    $scope.user = scriptData.user;
    //socketio
    var onChatConnected = function() {
        runOnce();
        onChatConnected = runAlways;
        function runOnce() {
            $socket.on('disconnect', onDisconnect);
            $socket.on('error', onError);
            $socket.on('presence', onPresence);
            $socket.on('chat-message', onChatMessage);
            function onPresence(customerData) {
                switch (customerData.status) {
                    case 'unavailable':
                        var customer = $scope.customers[customerData.from];
                        if (customer) {
                            customer.status = customerData.status;
                        }
                        break;
                    default:
                        var customer = customerData;
                        customer.messages = [];
                        customer.typing;
                        $scope.customers[customerData.from] = customer;
                        $socket.emit('presence', {to: customerData.from, fullname: scriptData.userFullname});
                        $timeout(function() {
                            $('textarea', '#chat-' + customer.from).keypress(function(e) {
                                if (e.keyCode == 13) {
                                    $scope.sendMessage(customer);
                                    e.preventDefault();
                                    return false;
                                }
                            });
                        });
                }
            } //function

            function onChatMessage(message) {
                var customerData = $scope.customers[message.from];
                if (customerData) {
                    customerData.messages.push(message);
                    scrollBottom('#chat-' + customerData.from);
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
    $socket.connect(scriptData.supportServiceURL, onChatConnected);
    $scope.sendMessage = function(customer) {
        var message = {
            body: customer.typing,
            to: customer.from
        };
        customer.typing = null;
        customer.messages.push(message);
        scrollBottom('#chat-' + customer.from);
        $socket.emit('chat-message', message);
    };

    $scope.removeChat = function(socketID) {
        if ($scope.customers[socketID])
            delete $scope.customers[socketID];
    };

    function scrollBottom(container) {
        $timeout(function() {
            var $dom = $('.chat-message-container', $(container));
            $dom.animate({"scrollTop": $dom[0].scrollHeight});
        });
    }
} //controller


