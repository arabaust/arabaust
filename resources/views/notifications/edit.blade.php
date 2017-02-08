@extends('app')

@section('content')
    <div class="card">

        {!! Form::model($notifications, ['method' => 'put', 'url' => '/notifications/' . $notifications->id, 'class' => 'form-horizontal']) !!}
            <div class="card-header">
                <h2>Edit {{ $notifications->name }}</h2>
            </div>

            @include('notifications.form')
        {!! Form::close() !!}
    </div>
@endsection
