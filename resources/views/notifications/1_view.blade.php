@extends('app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2><i class="md md-notifications"></i> Notification View</h2>
        </div>

        <div class="card-body card-padding">
            <div class="row">
                <div class="col-sm-6 m-b-20">
                    <p class="f-500 m-b-20 c-black">Notification Details</p>
                    <ul class="list-group">
                        <li class="list-group-item">
                        <strong class="d-block">Type:</strong>{{ $notification->type }}</li>
                        <li class="list-group-item">
                        <strong class="d-block">Message:</strong>{{ $notification->message }}</li>
                    </ul>
                </div>
                <div class="col-sm-6 m-b-20">
                    <p class="f-500 m-b-20 c-black">User Details</p>
                    <ul class="list-group">
                        <li class="list-group-item">
                        <strong class="d-block">Username:</strong>{{ $notification->user->username }}</li>
                        <li class="list-group-item">
                        <strong class="d-block">Email:</strong>{{ $notification->user->email }}</li>
                    </ul>
                </div>

                

            </div>

            <a class="btn btn-info btn-sm" href="{{ url('notifications') }}">Back</a>
        </div>
    </div>
@endsection
