var storage = {};

exports.set = function(socket, name, value) {
    if (!storage[socket.id]) {
        storage[socket.id] = {};
    }
    storage[socket.id][name] = value;
};

exports.get = function(socket, name) {
    if (!storage[socket.id] || !storage[socket.id][name]) {
        return false;
    } else {
        return storage[socket.id][name];
    }
};

exports.destroy = function(socket){
    if(!storage[socket.id]){
        return;
    }
    delete storage[socket.id];
};

