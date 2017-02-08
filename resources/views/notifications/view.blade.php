@extends('app')

@section('content')
    <div class="card">

        {!! Form::model($notifications, ['method' => 'put', 'class' => 'form-horizontal']) !!}
            <div class="card-header">
                <h2>Show {{ $notifications->name }}</h2>
            </div>


<div class="card-body card-padding">

    @include('partials.form-errors')

    <!-- Positions Form Input -->
     <div class="form-group">
        {!! Form::label('name', 'Subject:', ['class' => 'col-sm-2 control-label']) !!}

        <div class="col-sm-10">
            <div class="fg-line">
                <input type="text" name="role_id" value="<?= $subject; ?>" class="form-control input-sm" disabled="disabled">
            </div>
        </div>
    </div>
    
    
    <!-- Subject Form Input -->
    <div class="form-group">
        {!! Form::label('name', 'Subject:', ['class' => 'col-sm-2 control-label']) !!}

        <div class="col-sm-10">
            <div class="fg-line">
                {!! Form::text('name', null, ['class' => 'form-control input-sm', 'disabled' => 'disabled']) !!}
            </div>
        </div>
    </div>

    <!-- Description Form Input -->
    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            <div class="fg-line">
                {!! Form::textarea('description', null, ['class' => 'form-control input-sm', 'disabled' => 'disabled']) !!}
            </div>
        </div>
    </div>
    
    <!-- Sent On Form Input -->
    @if(isset($status))
    <div class="form-group">
         {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            <div class="fg-line">
            {!! Form::label('status', $status, ['class' => 'control-label']) !!}
            </div>
        </div>
    </div>
    @endif

     <!-- Sent On Form Input -->
    @if(!empty($notifications->sent_on))
    <div class="form-group ">
         {!! Form::label('sent_on', 'Sent On:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
            {!! Form::label('sent_on', $notifications->sent_on . ' By: ' .  $notifications->created_by, ['class' => 'control-label']) !!}
            </div>
        </div>
    </div>
    @endif

    <!-- Created On Form Input -->
    @if(!empty($notifications->created_at) && !empty($notifications->created_by))
    <div class="form-group ">
         {!! Form::label('created_at', 'Created On:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
            {!! Form::label('created_at', $notifications->created_at . ' By: ' .  $notifications->created_by, ['class' => 'control-label']) !!}
            </div>
        </div>
    </div>
    @endif

    <!-- Last Updated Form Input -->
    @if(!empty($notifications->updated_at) && !empty($notifications->updated_by))
    <div class="form-group top">
         {!! Form::label('updated_at', 'Last Updated:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
            {!! Form::label('updated_at', $notifications->updated_at . ' By: ' .  $notifications->updated_by, ['class' => 'control-label']) !!}
            </div>
        </div>
    </div>
    @endif
    

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <a class="btn btn-info btn-sm" href="{{ url('notifications') }}">Back</a>
        </div>
    </div>
</div>


{!! Form::close() !!}
    </div>
@endsection