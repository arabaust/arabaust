
@extends('app')

@section('content')
    <div class="block-header">
        <h2><li class="md md-settings"></li>@lang('contact_us.page_title')</h2>

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
                                <dt>
                                <li class="glyphicon"></li> @lang('contact_us.id')
                                </dt>
                                <p>{{$message['id']}}</p>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                             <dl class="dl-horizontal">
                                <dt>
                                <li class="glyphicon"></li> @lang('contact_us.title')
                                </dt>
                                <p>{{$message['title']}}</p>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                             <dl class="dl-horizontal">
                                <dt>
                                <li class="glyphicon"></li> @lang('contact_us.email')
                                </dt>
                                <p>
                                <a href="mailto:{{ $message['email'] }}">
                                {{$message['email']}}
                                </a>
                                </p>
                            </dl>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                             <dl class="dl-horizontal">
                                <dt>
                                <li class="glyphicon"></li> @lang('contact_us.phone')
                                </dt>
                                <p>{{$message['phone']}}</p>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                             <dl class="dl-horizontal">
                                <dt>
                                <li class="glyphicon"></li> @lang('contact_us.sent')
                                </dt>
                                <p>{{$message['created_at']}}</p>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                             <dl class="dl-horizontal">
                                <dt>
                                <li class="glyphicon"></li> @lang('contact_us.description')
                                </dt>
                                <p>{{$message['description']}}</p>
                            </dl>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-info btn-sm" href="{{ URL::previous() }}">@lang('common.back')</a>
                        </div>
                    </div>   
                </div>
                </div>
            </div>
        </div>


    </div>

@endsection
