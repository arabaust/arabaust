@extends('app')

@section('content')
    <div class="card">

        {!! Form::model($role, ['method' => 'put', 'url' => route('roles.index').'/' . $role->id, 'class' => 'form-horizontal']) !!}
            <div class="card-header">
                <h2>@lang('common.edit') {{ $role->role_title }}</h2>
            </div>

            @include('roles.form')
        {!! Form::close() !!}
    </div>
@endsection
