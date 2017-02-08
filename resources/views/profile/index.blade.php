@extends('app')

@section('content')
    <div class="block-header">
        <h2><i class="zmdi zmdi-face"></i> @lang('common.profile') {{ $profile->username }}</h2>
        <ul class="actions">
            <li>
                <a href="{{ route('profile.index').'/'. $profile->id  . '/edit' }}" class="btn btn-icon command-edit"><span class="md mk md-edit"></span>
                </a>
            </li>
        </ul>  
    </div>

    <div class="card">
        <div class="card-body card-padding">
            <h3><i class="zmdi zmdi-account m-r-5"></i> @lang('common.basic_information')</h3>
            <div class="pmbb-body p-l-30">
                <div class="pmbb-view">
                    <dl class="dl-horizontal">
                        <dt>@lang('common.first_name')</dt>
                        <dd>{{ $profile->first_name }}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>@lang('common.last_name')</dt>
                        <dd>{{ $profile->last_name }}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>@lang('common.position')</dt>
                         <dd>{{ $profile->role->role_title }}</dd>
                    </dl>
                </div>
            </div> 
            <h3><i class="zmdi zmdi-phone m-r-5"></i>@lang('common.contact_information')</h3>
            <div class="pmbb-body p-l-30">
                <div class="pmbb-view">

                         <dl class="dl-horizontal">
                            <dt>@lang('common.work_email')</dt>
                            <dd>{{ $profile->email }}</dd>
                        </dl>
                        
                        @if(!empty($profile->personal_email))
                        <dl class="dl-horizontal">
                            <dt>@lang('common.personal_email')</dt>
                             <dd>{{ $profile->personal_email }}</dd>
                        </dl>
                        @endif
                        
                         <dl class="dl-horizontal">
                            <dt>@lang('common.phone1')</dt>
                            <dd>{{ $profile->phone_1 }}</dd>
                        </dl>
                        
                        @if(!empty($profile->phone_2))
                        <dl class="dl-horizontal">
                            <dt>@lang('common.phone2')</dt>
                             <dd>{{ $profile->phone_2 }}</dd>
                        </dl>
                        @endif
                        
                        <dl class="dl-horizontal">
                            <dt>@lang('common.country')</dt>
                            <dd>{{ $profile->country }}</dd>
                        </dl>
                        
                        @if(!empty($profile->city))
                        <dl class="dl-horizontal">
                            <dt>@lang('common.city')</dt>
                            <dd>{{ $profile->city }}</dd>
                        </dl>
                        @endif

                   
                   
                </div>
            </div>
        </div>
    </div>

@endsection
