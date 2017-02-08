@extends('app')

@section('content')
    <div class="card">

        {!! Form::model($user, ['method' => 'put', 'url' => route('users.index') .'/'. $user->id, 'class' => 'form-horizontal']) !!}
            <div class="card-header">
                <h2>@lang('common.edit') {{ $user->username }}<small>@lang('common.password_edit')</small></h2>
            </div>

            @include('users.form')
        {!! Form::close() !!}
    </div>
@endsection
