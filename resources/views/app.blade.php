<!DOCTYPE html>
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $app['config']['app.name'] }}</title>
 
    <link rel="shortcut icon" href="/img/favicon.ico">
    <!-- Vendor CSS -->
    <link href="https://cdn.jsdelivr.net/animatecss/3.5.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.1.3/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/bootstrap.datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.uikit.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">

    @if (App::getLocale() == 'ar')
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.2.0-rc2/css/bootstrap-rtl.min.css" rel="stylesheet">
    @endif
    <link href="/css/{{App::getLocale()}}_vendors.css" rel="stylesheet">
    <link href="/css/{{App::getLocale()}}_app.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

</head>
<body>
<header id="header">
    <ul class="header-inner">
        <li id="menu-trigger" data-trigger="#sidebar">
            <div class="line-wrap">
                <div class="line top"></div>
                <div class="line center"></div>
                <div class="line bottom"></div>
            </div>
        </li>

        <li class="logo hidden-xs">

            <a href="{{ route('dashboard') }}">&nbsp;</a>
        </li>

        <li class="pull-right">
            <ul class="top-menu">
            <li class="language-icon" >
                 @if (App::getLocale() == 'en')
                  <a href="{{route('dashboard.changeLocale', ['locale' => 'ar' , 'path'=> Request::path()])}}"></i>@lang('menu.arabic')</a>
                @else
                    <a href="{{route('dashboard.changeLocale', ['locale' => 'en' ,'path'=>Request::path() ])}}"></i>@lang('menu.english')</a>
                @endif
            </li>
            
                <li id="toggle-width">
                    <div class="toggle-switch">
                        <input id="tw-switch" type="checkbox" hidden="hidden">
                        <label for="tw-switch" class="ts-helper"></label>
                    </div>
                </li>
                <!-- <li id="top-search">
                    <a class="tm-search" href=""></a>
                </li> -->
                <!--
                include('partials.notifications')
                 -->

                <li class="dropdown">
                    <a data-toggle="dropdown" class="tm-settings" href=""></a>
                    <ul class="dropdown-menu dm-icon pull-right">
                        <!-- <li class="skin-switch hidden-xs">
                            <span class="ss-skin bgm-nave" data-skin="#00254a"></span>
                            <span class="ss-skin bgm-rightRed" data-skin="#fb6767"></span>
                            <span class="ss-skin bgm-gray" data-skin="#808080"></span>
                            <span class="ss-skin bgm-green" data-skin="#8cc63f"></span>
                            <span class="ss-skin bgm-gold" data-skin="#926f4a"></span>
                            <span class="ss-skin bgm-blue" data-skin="#176fa6"></span>
                        </li> -->
                        <li>
                            <a href="{{ route('profile.index') }}"><i class="md md-person"></i> @lang('menu.my_profile')</a>
                        </li>
                        <li>
                            <a href="{{ route('settings.index') }}"><i class="md md-settings"></i> @lang('menu.site_settings')</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"><i class="md md-exit-to-app"></i> @lang('menu.logout')</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>

    @include('partials.search')
</header>

<section id="main">
    @include('partials.menu')

    <section id="content">
        <div class="container">

            @include('flash::message')

            @yield('content')

        </div>
    </section>

    <footer id="footer">
        <a href="http://www.premait.com/" target="_blank">PremaIT Solutions</a> © <?= date('Y'); ?>  All Rights Reserved.
    </footer>
</section>


@include('partials.ie9')


<script src="/js/all.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.uikit.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="http://mpryvkin.github.io/jquery-datatables-row-reordering/1.2.3/jquery.dataTables.rowReordering.js"></script>
<?php $current_route = \Request::route()->getName();?>
@if($current_route == 'cemeteries.create' || $current_route == 'cemeteries.edit')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9Hcvoqz0pXhdIe938pn-BmlybAWKrU7Q&callback=cemeteryMap"
  type="text/javascript"></script>
@endif
@if($current_route == 'address.create' || $current_route == 'address.edit')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9Hcvoqz0pXhdIe938pn-BmlybAWKrU7Q&callback=emergencyMaps"
  type="text/javascript"></script>
@endif
    
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
 <script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 170,
          toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                   ]
        });
    });
  </script>
<script>
    $(document).ready(function() {
        @yield('js')
    });
</script>


</body>
</html>
