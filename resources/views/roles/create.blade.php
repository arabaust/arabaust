@extends('app')

@section('content')
    <div class="card">

        {!! Form::open(['method' => 'POST', 'url' => route('roles.index'), 'class' => 'form-horizontal']) !!}
            <div class="card-header">
                <h2>@lang('roles.create_page_title')</h2>
            </div>

            @include('roles.form')
        {!! Form::close() !!}
    </div>
@endsection
