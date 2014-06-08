var $url = require('url');
var $config = require('./config.js');
var $io = require('socket.io').listen($config.servicePort);
var $sm = require('./socketManager.js');
var $app = require('express')();
var XMLHttpRequest = require('XMLHttpRequest.js').XMLHttpRequest;

var supporters = {};
var customers = {};

$app.get('/get_chat_support', function(req, res) {
    var callback = req.query.callback;
    for (var socketID in supporters) {
        res.send(callback + '("' + socketID + '");');
        return;
    }
    res.send(callback + '(-1);');
});

$app.listen(9191);

var $supportSerivce = $io.of('/support').on('connection', onSupportConnect);
var $chatService = $io.of('/chat').on('connection', onChatConnect);

function onSupportConnect(socket) {
    authenticate.apply(socket, ['supporter']);
    socket.on('disconnect', onDisconnect);
    socket.on('chat-message', onChatMessage);

    function onDisconnect() {
        if (supporters[socket.id])
            delete supporters[socket.id];
        $sm.destroy(socket);
    } //funciton

    function onChatMessage(message) {
        message.from = socket.id;
        message.userName = $sm.get(socket, 'user').fullname;
        var customer = findCustomerBySocketID(message.to);
        if (!customer) {
            socket.emit('presence', {
                from: message.to, 
                status: 'unavailable'
            });
            return;
        }
        customer.emit('chat-message', message);
    }
} //onSupportConnect

function findCustomerBySocketID(socketID) {
    for (var i in customers) {
        if (i == socketID)
            return customers[i];
    }
    return false;
}

function authenticate(role) {
    var socket = this;
    var userData = $url.parse(socket.handshake.url, true).query;
    if (!userData) {
        unauthorized();
        return;
    }
	if(role == 'supporter' && !userData.is_authorized == 'true'){
		unauthorized();
        return;
	}
    
    if (role == 'supporter')
        supporters[socket.id] = socket;
    else if (role == 'customer')
        customers[socket.id] = socket;
    $sm.set(socket, 'user', userData);
    socket.emit('auth-success');

    function unauthorized() {
        socket.emit('error', {
            type: 'unauthorized'
        });
        socket.disconnect();
    } //function
} //authenticateSupport

function onChatConnect(socket) {
    authenticate.apply(socket, ['customer']);
    socket.on('presence', onPresence);
	socket.on('disconnect', onDisconnect);
    socket.on('chat-message', onChatMessage);

    function onPresence(data) {
        var token = data.other.formData.token;
        var socketSupporter = supporters[token];

        if (socketSupporter) {
            $sm.set(socket, 'presence', data);
            $sm.set(socket, 'supporterSocketID', token);

            var forward = JSON.parse(JSON.stringify(data));
            forward.user = $sm.get(socket, 'user');
            forward.from = socket.id;
            forward.to = socketSupporter.id;
            socketSupporter.emit('presence', forward);
        } else {
            socket.emit('error', {
                type: 'service-unvailable'
            });
            socket.disconnect();
            return;
        }
    } //function
	
	function onDisconnect(){
		var socket = this;
		if(customers[socket.id]){
			var customer = customers[socket.id];
			var supporterID = $sm.get(customer, 'supporterSocketID');
			var socketSupporter = findSupporterBySocketID(supporterID);
			socketSupporter.emit('presence', {
				from: customer.id,
				to: supporterID,
				status: 'unavailable'
			});
		}
	}

    function onChatMessage(message) {
        message.from = socket.id;
        message.to = $sm.get(socket, 'supporterSocketID');
        message.userName = $sm.get(socket, 'user').fullname;
        var supporter = findSupporterBySocketID(message.to);
        if (!supporter) {
            socket.emit('error', {
                type: 'service-unavailable'
            });
            socket.disconnect();
            return;
        }
        supporter.emit('chat-message', message);
    } //function
} //onChatConnect

function findSupporterBySocketID(socketID) {
    for (var i in supporters) {
        var socket = supporters[i];
        if (socket.id == socketID) {
            return socket;
        }
    }
    return false;
}

