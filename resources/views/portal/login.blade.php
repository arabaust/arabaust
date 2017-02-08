<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8"/>
    <title></title>
    <script src="//code.jquery.com/jquery-1.11.1.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script>
        $(function(){
            if ($.cookie("realtime-chat-nickname")) {
                window.location = "{{ URL::to('en/portal/chat') }}";
            } else {
                $("#frm-login").submit(function(event) {
                    event.preventDefault();
                    if ($("#nickname").val() !== '') {
                        $.cookie("realtime-chat-nickname", $("#nickname").val());
                        window.location = "{{ URL::to('en/portal/chat') }}";
                    }
                })
            }
        })
    </script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"/>
</head>
<body>
<div class="container" style="padding-top: 50px">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Choose a nickname to enter chat</h3>
                </div>
                <div class="panel-body">
                    <form role="form" id="frm-login">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Nickname" name="nickname" id="nickname" type="text" autofocus="" required=""/>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Enter Chat</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>