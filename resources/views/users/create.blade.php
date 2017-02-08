@extends('app')

@section('content')
    <div class="card">

        {!! Form::open(['method' => 'POST', 'url' => route('users.index'), 'class' => 'form-horizontal']) !!}
            <div class="card-header">
                <h2>@lang('users.create_page_title')</h2>
            </div>

            @include('users.form')
        {!! Form::close() !!}
    </div>
@endsection
