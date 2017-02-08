@extends('app')

@section('content')
    <div class="card">

        {!! Form::model($client, ['method' => 'put', 'url' => route('clients.index').'/'. $client->id, 'class' => 'form-horizontal']) !!}
            <div class="card-header">
                <h2>@lang('common.edit') : {{ $client->first_name }} {{ $client->last_name }}</h2>
            </div>

            @include('clients.form')
        {!! Form::close() !!}
    </div>
@endsection
