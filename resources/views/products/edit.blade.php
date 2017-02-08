@extends('app')

@section('content')
    <div class="card">

        {!! Form::model($product, ['method' => 'put', 'url' => route('products.index').'/'. $product->id, 'class' => 'form-horizontal','files' => true ]) !!}
            <div class="card-header">
                <h2>@lang('common.edit') {{ $product[App::getLocale().'_product_name'] }} </h2>
            </div>

            @include('products.form')
        {!! Form::close() !!}
    </div>
@endsection