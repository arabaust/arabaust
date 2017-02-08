@extends('app')

@section('content')
    <div class="card">

        {!! Form::model($gallary, ['method' => 'put', 'url' => route('gallary.index').'/'. $gallary->id, 'class' => 'form-horizontal','files' => true ]) !!}
            <div class="card-header">
                <h2>@lang('common.edit') {{ $gallary[App::getLocale().'_product_name'] }} </h2>
            </div>

            @include('gallary.form')
        {!! Form::close() !!}
    </div>
@endsection