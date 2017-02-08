<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title></title>
    <script src="//code.jquery.com/jquery-1.11.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.4.0/jquery.timeago.min.js"></script>
    <script src="//js.pusher.com/2.2/pusher.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        var pusher = new Pusher('8af5dce25ba6305d40a5');
        var channel = pusher.subscribe('chat');
        channel.bind('message', function(data) {
            var message = data.message;
            $(".media-list li").first().remove();
            $(".media-list").append('<li class="media"><div class="media-body"><div class="media"><div class="media-body">'
            + message.message + '<br/><small class="text-muted">' + message.author + ' | ' + message.created_at + '</small><hr/></div></div></div></li>');
        });

        function refreshMessages(messages) {
            $.each(messages.reverse(), function(i, message) {
                $(".media-list").append('<li class="media"><div class="media-body"><div class="media"><div class="media-body">'
                + message.message + '<br/><small class="text-muted">' + message.author + ' | ' + message.created_at + '</small><hr/></div></div></div></li>');
            });
        }

        $(function(){

            if (typeof $.cookie("realtime-chat-nickname") === 'undefined') {
                window.location = "{{ URL::to('en/portal/login') }}";
            } else {
                $.get("{{ URL::to('en/portal/get_messages') }}", function (messages) {

                    refreshMessages(messages);
                    
                });

                $("#sendMessage").on("click", function() {
                    sendMessage();
                    $(".media-list").empty();
                    $.get("{{ URL::to('en/portal/get_messages') }}", function (messages) {

                        refreshMessages(messages);
                    
                    });
                });

                $('#messageText').keyup(function(e){
                    if(e.keyCode == 13)
                    {
                        sendMessage();
                    }
                });
            }

            function sendMessage() {
                $container = $('.media-list');
                $container[0].scrollTop = $container[0].scrollHeight;
                var message = $("#messageText").val();
                var author = $.cookie("realtime-chat-nickname");
                $.post( "{{ URL::to('en/portal/messages') }}", {message: message, author: author}, function( data ) {
                    $("#messageText").val("")
                });
                $container.animate({ scrollTop: $container[0].scrollHeight }, "slow");
            }
        });
    </script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        .fixed-panel {
            min-height: 500px;
            max-height: 500px;
        }
        .media-list {
            overflow: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row " style="padding-top:40px;">
        <h3 class="text-center">Realtime Chat Application with NodeJS, SocketIO, and MongoDB </h3>
        <br/><br/>

        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong><span class="glyphicon glyphicon-list"></span> Chat History</strong>
                </div>
                <div class="panel-body fixed-panel">
                    <ul class="media-list">
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Message" id="messageText" autofocus/>
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="button" id="sendMessage">SEND <span class="glyphicon glyphicon-send"></span></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>