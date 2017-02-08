<!DOCTYPE html>
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $app['config']['app.name'] }}</title>

    <link rel="shortcut icon" href="/img/favicon.ico">

  <link href="/css/en_vendors.css" rel="stylesheet">
  <link href="/css/en_app.css" rel="stylesheet">

    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body class="login-content">
<!-- Login -->
<div class="lc-block toggled" id="l-login">
    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {{ Session::get('flash_notification.message') }}
        </div>
    @endif
    @include('partials.form-errors')
    <form action="/password/reset" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-person"></i></span>

            <div class="fg-line">
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
            </div>
        </div>

        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-accessibility"></i></span>

            <div class="fg-line">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>

        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-autorenew"></i></span>

            <div class="fg-line">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
            </div>
        </div>

        <button type="submit" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></button>
    </form>
</div>


@include('partials.ie9')

<script src="/js/all.js"></script>

</body>
</html>
