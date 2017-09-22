var CONFIG = (function() {
     var private = {
         'api_push': 'http://localhost/jdict/public/engine/push',
         'api_pull': 'http://localhost/jdict/public/engine/pull',
         'pulling_time_out': 30000
     };

     return {
        get: function(name) { return private[name]; }
    };
})();


function Chatter(){
    this.getMessage = function(callback, lastTime){
            var t = this;
            var latest = null;

            $.ajax({
                    'url': CONFIG.get('api_pull'),
                    'type': 'get',
                    'dataType': 'json',
                    'data': {
                            'mode': 'get',
                            'lastTime': lastTime
                    },
                    'timeout': CONFIG.get('pulling_time_out'),
                    'cache': false,
                    'success': function(result){
                            if(result.result){
                                    callback(result.message);
                                    latest = result.latest;
                            } 
                    },
                    'error': function(e){
                            console.log(e);
                    },
                    'complete': function(){
                            t.getMessage(callback, latest);
                    }
            });
    };

    this.postMessage = function(user, text, callback){
            $.ajax({
                    'url': CONFIG.get('api_push'),
                    'type': 'post',
                    'dataType': 'json',
                    'data': {
                            'mode': 'post',
                            'user': user,
                            'text': text
                    },
                    'success': function(result){
                            callback(result);
                    },
                    'error': function(e){
                            console.log(e);
                    }
            });
    };
};

var c = new Chatter();
function inputSendKeyPress(e)
{
    // look for window.event in case event isn't passed in
    e = e || window.event;
    if (e.keyCode == 13)
    {
    	var message = $("#input-message-send").val();
    	$("#input-message-send").val("");
    	$("#_cw").append('<p>' + message + '</p>');
    	
        c.postMessage(user.val(), message, function(result){
                if(result){
                	alert(result);
                        text.val('');
                }
        });

        return false;
    }
    return true;
}

$(document).ready(function(){
    c.getMessage(function(message){
            var chat = $("#_cw").empty();

            for(var i = 0; i < message.length; i++){
            	console.log(message[i]);
                    chat.append(
                            '<li class="chatMessage">' +
                            ' <span class="chatUsername">' + message[i].user['name'] + '</span>' +
                            ' <p class="chatText">' + message[i].message + '</p>' +
                            '</li>'
                    );
            }

            //$('#chatMessageList').scrollTop($('#chatMessageList')[0].scrollHeight);
    });
});