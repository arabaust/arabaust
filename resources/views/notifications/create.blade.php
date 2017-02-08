@extends('app')

@section('content')
    <div class="card">

        {!! Form::open(['method' => 'POST', 'url' => 'notifications', 'class' => 'form-horizontal']) !!}
        <div class="card-header">
            <h2>Add an Notification</h2>
        </div>

        @include('notifications.form')
        {!! Form::close() !!}
    </div>
@endsection
