<div class="card-body card-padding">

    @include('partials.form-errors')

    <!-- Role_title Form Input -->
    <div class="form-group">
        {!! Form::label('role_title', @trans('roles.position').':', ['class' => 'col-sm-2 control-label required']) !!}
        <div class="col-sm-10">
            <div class="fg-line">
                {!! Form::text('role_title', null, ['class' => 'form-control input-sm', 'maxlength' => "30"]) !!}
            </div>
        </div>
    </div>

    <!-- status Form Input -->
    <div class="form-group">        
        {!! Form::label('status', @trans('roles.status').':', ['class' => 'col-sm-2 control-label ']) !!}
        <div class="col-sm-10">
            <div class="fg-line">
                <select name="status" id="status" class="form-control input-sm selectpicker">
                    @if(isset($role->status) && $role->status == 1)
                        <option value="1" selected="selected" >@lang('common.active')</option>
                        <option value="0">@lang('common.inactive')</option>
                    @else
                        <option value="1">@lang('common.active')</option>
                        <option value="0" selected="selected">@lang('common.inactive')</option>
                    @endif
                </select>
            </div>
        </div>
    </div>

    <div>
        <p class="warning-text"><strong class="warning">@lang('common.warning'):</strong> @lang('roles.deactivate_warning')</p>
    </div>
    
    <!-- Permitted Modules Form Input -->
    <div class="form-group">
        {!! Form::label('permission_id', @trans('roles.permitted_modules').':', ['class' => 'col-sm-2 control-label required']) !!}
        <div class="col-sm-10">
            <div class="fg-line">
                <select class="form-control input-sm tag-select" multiple name="permission_id[]"> 
                @foreach($permissions as $key => $permission)
                    @if(isset($permission_roles))
                        @if(in_array($permission, $permission_roles))
                            <option value="<?= $key ?>" selected="selected"><?= $permission ?></option>
                        @else
                            <option value="<?= $key ?>"><?= $permission ?></option>
                        @endif
                    @else
                        <option value="<?= $key ?>"><?= $permission ?></option>
                    @endif
                @endforeach
                </select>
            </div>
        </div>
    </div>
    
    <!-- Description Form Input -->
    <div class="form-group">
        {!! Form::label('description', @trans('roles.description').':', ['class' => 'col-sm-2 control-label required']) !!}
        <div class="col-sm-10">
            <div class="fg-line">
                {!! Form::textarea('description', null, ['class' => 'form-control input-sm']) !!}
            </div>
        </div>
    </div>

    <!-- Created On Form Input -->
    @if(!empty($role->created_at) && !empty($role->created_by))
    <div class="form-group ">
         {!! Form::label('created_at', @trans('common.created_on').':', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
            {!! Form::label('created_at', $role->created_at .  ' '.@trans('common.by').' : ' .  $role->created_by, ['class' => 'control-label']) !!}
            </div>
        </div>
    </div>
    @endif

    <!-- Last Updated Form Input -->
    @if(!empty($role->updated_at) && !empty($role->updated_by))
    <div class="form-group top">
         {!! Form::label('updated_at', @trans('common.last_update').':', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
            {!! Form::label('updated_at', $role->updated_at. ' '.@trans('common.by').' : ' .  $role->updated_by, ['class' => 'control-label']) !!}
            </div>
        </div>
    </div>
    @endif

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary btn-sm">@lang('common.save')</button>
            <a class="btn btn-info btn-sm" href="{{ route('roles.index') }}">@lang('common.back')</a>
        </div>
    </div>
</div>
