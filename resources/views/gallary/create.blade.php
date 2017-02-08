@extends('app')

@section('content')
    <div class="card">

        {!! Form::open(['method' => 'POST', 'url' => route('gallary.store'), 'class' => 'form-horizontal', 'files' => true ]) !!}
        <div class="card-header">
            <h2>@lang('gallary.create_page_title')</h2>
        </div>

        @include('gallary.form')
        {!! Form::close() !!}
    </div>
@endsection
