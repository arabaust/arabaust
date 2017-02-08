@extends('portal.layout.main')

@section('content')
    <div class="card">

        {!! Form::model($client, ['method' => 'put', 'route' => array('portal_profile.update',$client->id) , 'class' => 'form-horizontal']) !!}
            <div class="card-header">
                <h2>@lang('common.edit') : {{ $client->first_name }} {{ $client->last_name }}</h2>
            </div>
            @include('flash::message')
            @include('portal.profile_form')
        {!! Form::close() !!}
    </div>
@endsection
