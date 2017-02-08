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
    <form action="{{route('portal.post_login')}}" method="POST">
        {!! csrf_field() !!}
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-person"></i></span>

            <div class="fg-line">
                <input type="text" name="email" class="form-control" placeholder="Username or Email" value="{{ old('email') }}">
            </div>
        </div>

        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-accessibility"></i></span>

            <div class="fg-line">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>

        <div class="input-group m-b-20 m-l-30">
            <div class="fg-line">
                <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="" name="remember">
                <i class="input-helper"></i>
                Keep me signed in
            </label>
        </div>
        
        <a href="{{ $facebook_url }}"><img src="{{ asset('/img/social/facebook-sign-in-button-png-26.png') }}" width='150' /></a>
        <a href="{{ $twitter_url }}"><img src="{{ asset('/img/social/twitter-login.png') }}" width='150' /></a>
        <a href="{{ $google_url }}"><img src="{{ asset('/img/social/sign-in-with-google.png') }}" width='150' /></a>
        
        <button type="submit" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></button>
    </form>
    <ul class="login-navigation">
        <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
        <li data-block="#l-forget-password" class="bgm-orange">Sign Up</li>
    </ul>
</div>

<!-- Forgot Password -->
<div class="lc-block" id="l-forget-password">
    <p class="text-left">We can help you reset your password using your email address linked to your account.</p>

    <form action="/password/forgot" method="POST">
        {!! csrf_field() !!}
        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-email"></i></span>

            <div class="fg-line">
                <input type="text" class="form-control" placeholder="Email Address" name="email">
            </div>
        </div>

        <button class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></button>
    </form>
    <ul class="login-navigation">
        <li data-block="#l-login" class="bgm-green">Login</li>
    </ul>
</div>

@include('partials.ie9')

<script src="/js/all.js"></script>

</body>
</html>
