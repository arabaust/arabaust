<aside id="sidebar">
    <div class="sidebar-inner">
        <div class="s-profile">
            <a href="{{ url('dashboard') }}" data-ma-action="profile-menu-toggle">
                <div class="sp-pic">
                    <!-- <img src="/img/e-clinic.png" alt="E-Clinic" class="e-clinic"> -->
                </div>
            </a>
        </div>
        <div class="si-inner">
            <ul class="main-menu">
                <li class=""><a href="{{ route('dashboard') }}"><i class="md md-home"></i>@lang('menu.dashboard')</a></li>

                @if (isAllowed('settings'))
                <li class="sub-menu">
                    <a href="" id="settings"><i class="md md-settings"></i>@lang('menu.settings')</a>
                    <ul>
                        <li><a id="settings" class="" href="{{route('settings.index')}}">@lang('menu.site_settings')</a></li>
                        <li><a class="" href="{{route('settings.about')}}">@lang('menu.site_about')</a></li>
                        <li><a class="" href="{{route('settings.terms')}}"></i>@lang('menu.site_terms')</a></li>
                    </ul>
                </li>
                @endif
                @if (isAllowed('users') || isAllowed('roles'))
                <li class="sub-menu">
                    <a href=""><i class="md md-people"></i>@lang('menu.users')</a>
                    <ul>
                        @if (isAllowed('users'))
                        <li><a id="users" class="" href="{{route('users.index')}}">@lang('menu.users')</a></li>
                        @endif

                        @if (isAllowed('roles'))
                        <li><a class="" href="{{route('roles.index')}}">@lang('menu.permissions')</a></li>
                        @endif
                    </ul>
                </li>
                @endif

                @if (isAllowed('clients'))
                        <li class=""><a id="clients" href="{{ route('clients.index') }}"><i class="md md-people"></i>@lang('menu.clients')</a></li>
                @endif

                

                @if (isAllowed('products'))
                     <li class=""><a id="products" href="{{ route('products.index') }}"><i class="zmdi zmdi-format-align-justify"></i>@lang('menu.products')</a></li>
                @endif
                
              
                @if (isAllowed('pages'))
                        <li class=""><a id="gallary" href="{{ route('gallary.index') }}"><i class="zmdi zmdi-pin"></i>@lang('menu.gallary')</a></li>
                @endif


                @if (isAllowed('pages'))
                        <li class=""><a id="clients" href="{{ route('contact_us.index') }}"><i class="zmdi zmdi-edit"></i>@lang('menu.contact')</a></li>
                @endif


            </ul>
        </div>
    </div>
</aside>
