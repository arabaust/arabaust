@extends('app')

@section('content')
    <div class="card">

        {!! Form::open(['method' => 'POST', 'url' => route('product.store'), 'class' => 'form-horizontal', 'files' => true ]) !!}
        <div class="card-header">
            <h2>@lang('products.create_page_title')</h2>
        </div>

        @include('products.form')
        {!! Form::close() !!}
    </div>
@endsection
