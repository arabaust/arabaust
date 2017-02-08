<div class="card-body card-padding">

    @include('partials.form-errors')
    
    <!-- Positions Form Input -->
    <div class="form-group">
        {!! Form::label('role_id', 'To (Positions):', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            <div class="fg-line">
                <select class="form-control input-sm tag-select" multiple name="role_id[]"> 
                @foreach($roles as $key => $role)
                    @if(isset($notification_roles))
                        @if(in_array($role, $notification_roles))
                            <option value="<?= $key ?>" selected="selected"><?= $role ?></option>
                        @else
                            <option value="<?= $key ?>"><?= $role ?></option>
                        @endif
                    @else
                        <option value="<?= $key ?>"><?= $role ?></option>
                    @endif
                @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Subject Form Input -->
    <div class="form-group">
        {!! Form::label('name', 'Subject:', ['class' => 'col-sm-2 control-label']) !!}

        <div class="col-sm-10">
            <div class="fg-line">
                {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
            </div>
        </div>
    </div>

    <!-- Description Form Input -->
    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            <div class="fg-line">
                {!! Form::textarea('description', null, ['class' => 'form-control input-sm']) !!}
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
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
            @if(isset($notifications->status))
                @if($notifications->status != 1)
                <a class="btn bgm-gray btn-sm" href="send">Send</a>
                @endif
            @endif
            <a class="btn btn-info btn-sm" href="{{ url('notifications') }}">Back</a>
        </div>
    </div>
</div>
