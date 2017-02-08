@extends('app')

@section('content')
    <div class="card">

    {!! Form::model($profile, ['method' => 'put', 'url' => route('profile.index').'/'. $profile->id, 'class' => 'form-horizontal']) !!}
    
        <div class="card-header">
            <h2>@lang('common.edit') {{ $profile->username }}<small>@lang('common.password_edit')</small></h2>
        </div>

        <div class="card-body card-padding">

            @include('partials.form-errors')

            <!-- Username, Work Email Form Input -->
            <div class="form-group">
                {!! Form::label('username', trans('common.username').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        {!! Form::text('username', null, ['class' => 'form-control input-sm', 'maxlength' => "30"]) !!}
                    </div>
                </div>

                {!! Form::label('email',  trans('common.login_email').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        {!! Form::email('email', null, ['class' => 'form-control input-sm']) !!}
                    </div>
                </div>

            </div>

            <!-- First_name, Last_name Form Input -->
            <div class="form-group">
                {!! Form::label('first_name', trans('common.first_name').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        {!! Form::text('first_name', null, ['class' => 'form-control input-sm', 'maxlength' => "15"]) !!}
                    </div>
                </div>
                
                 {!! Form::label('last_name', trans('common.last_name').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        {!! Form::text('last_name', null, ['class' => 'form-control input-sm', 'maxlength' => "15"]) !!}
                    </div>
                </div>

            </div>

            <!-- status, Role Form Input -->
            <div class="form-group">        
                {!! Form::label('status', trans('common.status').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        <select name="status" id="status" class="form-control input-sm selectpicker" disabled="disabled">
                            @if(isset($profile->status) && $profile->status == 1)
                                <option value="1" selected="selected" >@lang('common.active')</option>
                                <option value="0">@lang('common.inactive')</option>
                            @else
                                <option value="1">@lang('common.active')</option>
                                <option value="0" selected="selected">@lang('common.inactive')</option>
                            @endif
                        </select>
                    </div>
                </div>

                {!! Form::label('role_id', trans('common.position').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                         {{-- {!! Form::label('role_id', $roles, ['class' => 'form-control input-sm']) !!} --}}
                        {!! Form::select('role_id', $roles, null, ['class' => 'form-control input-sm selectpicker', 'disabled' => 'disabled']) !!}
                    </div>
                </div>

            </div>

            <!-- Password, Password_confirmation Form Input -->
            <div class="form-group">
                {!! Form::label('password', trans('common.password').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        {!! Form::password('password', ['class' => 'form-control input-sm']) !!}
                    </div>
                </div>

                {!! Form::label('password_confirmation', trans('common.confirm_password').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        {!! Form::password('password_confirmation', ['class' => 'form-control input-sm']) !!}
                    </div>
                </div>
            </div>

            <div>
                <p class="warning-text"><strong class="warning">@lang('common.warning') :</strong> @lang('common.password_resrictions')</p>
            </div>

            <!-- Phone 1, Phone 2 Form Input -->
            <div class="form-group">

                {!! Form::label('phone_1', trans('common.phone1').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        {!! Form::text('phone_1', null, ['class' => 'form-control input-sm']) !!}
                    </div>
                </div>

                {!! Form::label('phone_2', trans('common.phone2').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        {!! Form::text('phone_2', null, ['class' => 'form-control input-sm']) !!}
                    </div>
                </div>
                
            </div>

             <!-- Country, City Form Input -->
            <div class="form-group">
                {!! Form::label('country', trans('common.country').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        {!! Form::select('country', $countries, null, ['class' => 'form-control input-sm selectpicker']) !!}
                    </div>
                </div>

                {!! Form::label('city', trans('common.city').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        {!! Form::select('city', $city, null, ['class' => 'form-control input-sm selectpicker']) !!}
                    </div>
                </div>
            </div>

            <!-- Personal Email Form Input -->
            <div class="form-group">
                {!! Form::label('personal_email', trans('common.personal_email').' :', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                        {!! Form::email('personal_email', null, ['class' => 'form-control input-sm']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-sm">@lang('common.save')</button>
                    <a class="btn btn-info btn-sm" href="{{ route('profile.index') }}">@lang('common.back')</a>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    </div>
@endsection
