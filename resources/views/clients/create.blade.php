@extends('app')

@section('content')
    <div class="card">

        {!! Form::open(['method' => 'POST', 'url' => route('clients.index'), 'class' => 'form-horizontal']) !!}
        <div class="card-header">
            <h2>@lang('clients.create_page_title')</h2>
        </div>

        @include('clients.form')
        {!! Form::close() !!}
    </div>
@endsection
