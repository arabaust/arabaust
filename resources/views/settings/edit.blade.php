@extends('app')

@section('content')
    <div class="card">

        {!! Form::model($settings, ['method' => 'put', 'url' => route('settings.index') .'/'. $settings->id, 'class' => 'form-horizontal']) !!}
        <div class="card-header">
            <h2>@lang('common.edit') {{ $settings->name }}</h2>
        </div>

        <div class="card-body card-padding">

            @include('partials.form-errors')

            <!-- FTV Name Form Input -->
            <div class="form-group">
                {!! Form::label('ftv_name', trans('settings.app_name'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="fg-line">
                        {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required' => 'required', 'maxlength' => "30"]) !!}
                    </div>
                </div>
            </div>

            <!-- Email Form Input -->
            <div class="form-group">
                {!! Form::label('email', trans('common.email'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="fg-line">
                        {!! Form::email('email', null, ['class' => 'form-control input-sm']) !!}
                    </div>
                </div>
            </div>

            <!-- notification_email Form Input -->
            <div class="form-group form-group-options">
                {!! Form::label('notification_email[]', trans('settings.notification_email'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                @for($i = 0; $i < count($emails) + 1 ; $i++)
                    <div class="input-group input-group-option">
                        <div class="fg-line">
                            {!! Form::email('notification_email[' . $i . ']', (isset($emails[$i])) ? $emails[$i] : null, ['class' => 'form-control input-sm']) !!}
                        </div>
                            <span class="input-group-addon last input-group-addon-remove">
                                <i class="md md-remove-circle-outline"></i>
                            </span>
                    </div>
                @endfor
                </div>
            </div>

            <!-- <div class="form-group">
                {!! Form::label('notification_email', 'Notification Email:', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="fg-line">
                        {!! Form::text('notification_email', null, ['class' => 'form-control input-sm', 'placeholder' => 'Multiple Emails need to be separated by ";"']) !!}
                    </div>
                    <p><strong>Note:</strong> Multiple Emails need to be separated by ";"</p>
                </div>
            </div>
 -->
            <!-- Phone_1 Form Input -->
            <div class="form-group">
                {!! Form::label('phone_1', trans('common.phone1'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="fg-line">
                        {!! Form::text('phone_1', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
                    </div>
                </div>
            </div>

            <!-- Phone_2 Form Input -->
            <div class="form-group">
                {!! Form::label('phone_2', trans('common.phone2'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="fg-line">
                        {!! Form::text('phone_2', null, ['class' => 'form-control input-sm']) !!}
                    </div>
                </div>
            </div>

            <!-- Fax Form Input -->
            <div class="form-group">
                {!! Form::label('fax', trans('common.fax'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="fg-line">
                        {!! Form::text('fax', null, ['class' => 'form-control input-sm']) !!}
                    </div>
                </div>
            </div>

            <!-- Country Form Input -->
            <div class="form-group">
                {!! Form::label('country', trans('common.country'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="fg-line">
                        {!! Form::select('country', $countries, null, ['class' => 'form-control input-sm selectpicker']) !!}
                    </div>
                </div>
            </div>

            <!-- City Form Input -->
            <div class="form-group">
                {!! Form::label('city', trans('common.city'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="fg-line">
                        {!! Form::select('city', $city, null, ['class' => 'form-control input-sm selectpicker']) !!}
                    </div>
                </div>
            </div>

            <!-- zip_code Form Input -->
            <div class="form-group">
                {!! Form::label('zip_code', trans('settings.postal_code'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="fg-line">
                        {!! Form::text('zip_code', null, ['class' => 'form-control input-sm']) !!}
                    </div>
                </div>
            </div>

            <!-- physical_address Form Input -->
            <div class="form-group">
                {!! Form::label('physical_address', trans('settings.physical_address'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="fg-line">
                        
                        {!! Form::textarea('physical_address', null, ['class' => 'form-control input-sm', 'required' => 'required', 'maxlength' => "500"]) !!}
                    </div>
                </div>
            </div>

             <!-- mailing_address Form Input -->
            <div class="form-group">
                {!! Form::label('mailing_address', trans('settings.mailing_address'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php
                        if(!empty($settings->mailing_address))
                        {
                            $settings->mailing_address = strip_tags(nl2br(e($settings->mailing_address)));
                        }
                        ?>
                        {!! Form::textarea('mailing_address', null, ['class' => 'form-control input-sm', 'maxlength' => "500"]) !!}
                    </div>
                </div>
            </div>
            
            <!-- Last Updated Form Input -->
            @if(!empty($settings->updated_at) && !empty($settings->updated_by))
            <div class="form-group top">
                 {!! Form::label('updated_at', trans('common.last_update'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="fg-line">
                    {!! Form::label('updated_at', $settings->updated_at .' '. trans('common.by') .': '.  $settings->updated_by, ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div>
            @endif

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-sm">@lang('common.save')</button>
                    <a class="btn btn-info btn-sm" href="{{ route('settings.index') }}">@lang('common.back')</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
