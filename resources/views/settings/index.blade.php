@extends('app')

@section('content')
    <div class="block-header">
        <h2><li class="md md-settings"></li>@lang('settings.page_title')</h2>

        <ul class="actions">
            <li>
                <a href="{{ route('settings.index') }}/1/edit" class="btn btn-icon command-edit" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit <?= $settings->name ?>"><span class="md mk md-edit"></span></a>
            </li>
        </ul>

    </div>

    <div class="card">

        <div class="text-center">
        </div>
        <div class="card-body card-padding">
            <div class="pmbb-body p-l-30 p-t-30">
                <div class="pmbb-view">
                    
                    <div class="row">
                        <div class="col-md-6">
                             <dl class="dl-horizontal">
                                <dt><li class="glyphicon glyphicon-star"></li> @lang('settings.app_name')</dt>
                                <dd class="setting-card">{{ $settings->name }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="dl-horizontal">
                                <dt><li class="glyphicon glyphicon-phone-alt"></li> @lang('common.fax')</dt>
                        <dd class="setting-card">{{ $settings->fax }}</dd>
                            </dl>   
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <dl class="dl-horizontal">
                                <dt> <li class="glyphicon glyphicon-envelope"></li> @lang('common.email')</dt>
                                <dd class="setting-card">{{ $settings->email }}</dd>
                            </dl>
                            <p><strong class="note">@lang('common.note')</strong> @lang('settings.email_note')</p>
                        </div>
                        <div class="col-md-6">
                            <dl class="dl-horizontal">
                                <dt> <li class="zmdi zmdi-notifications"></li> @lang('settings.notification_email')</dt>
                                <dd class="setting-card"><?= str_replace(';', '</br>', $settings->notification_email); ?></dd>
                            </dl>
                            <p><strong class="note">@lang('common.note')</strong>@lang('settings.notification_note')</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <dl class="dl-horizontal">
                                <dt><li class="zmdi zmdi-account-box-phone zmdi-hc-fw"></li> @lang('common.phone1')</dt>
                                <dd class="setting-card">{{ $settings->phone_1 }}</dd>
                            </dl>   
                        </div>
                        <div class="col-md-6">
                            <dl class="dl-horizontal">
                                <dt><li class="md md-phone"></li> @lang('common.phone2')</dt>
                                <dd class="setting-card">{{ $settings->phone_2 }}</dd>
                            </dl>   
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <dl class="dl-horizontal">
                                <dt><li class="zmdi zmdi-city-alt zmdi-hc-fw"></li> @lang('common.country')</dt>
                                <dd class="setting-card">{{ $settings->country }}</dd>
                            </dl>   
                        </div>
                        <div class="col-md-6">
                            <dl class="dl-horizontal">
                                <dt><li class="zmdi zmdi-city zmdi-hc-fw"></li> @lang('common.city')</dt>
                                <dd class="setting-card">{{ $settings->city }}</dd>
                            </dl>   
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <dl class="dl-horizontal">
                                <dt><li class="zmdi zmdi-google-maps zmdi-hc-fw"></li> @lang('settings.physical_address')</dt>
                                <dd class="setting-card">{{ $settings->physical_address }}</dd>
                            </dl>   
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <dl class="dl-horizontal">
                                <dt><li class="zmdi zmdi-map zmdi-hc-fw"></li> @lang('settings.mailing_address')</dt>
                                <dd class="setting-card">{{ $settings->mailing_address }}</dd>
                            </dl>   
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <dl class="dl-horizontal">
                                <dt><li class="glyphicon glyphicon-map-marker"></li> @lang('settings.postal_code')</dt>
                                <dd class="setting-card">{{ $settings->zip_code }}</dd>
                            </dl>   
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
