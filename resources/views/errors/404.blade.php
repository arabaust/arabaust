<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $app['config']['app.name'] }}</title>

    <link rel="shortcut icon" href="/img/favicon.ico">

    @if (App::getLocale() == 'ar')
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.2.0-rc2/css/bootstrap-rtl.min.css" rel="stylesheet">
    @endif
    <link href="/css/{{App::getLocale()}}_vendors.css" rel="stylesheet">
    <link href="/css/{{App::getLocale()}}_app.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/animatecss/3.5.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">
  </head>
  <body class="four-zero-content">
    <div class="four-zero error">
      <h3>Access Denied!</h3>
      <small> You do not have permission to view this page.</small>
      <footer>
        <a href="{{ URL::previous() }}"><i class="md md-arrow-back"></i></a>
        <a href="{{ route('dashboard') }}"><i class="md md-home"></i></a>
      </footer>
		</div>
  </body>
</html>
