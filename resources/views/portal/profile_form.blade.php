<div class="card-body card-padding">

    @include('partials.form-errors')
    
    {!! csrf_field() !!}

    <!-- First_name, Last_name Form Input -->
    <div class="form-group">
        {!! Form::label('first_name', @trans('common.first_name').':', ['class' => 'col-sm-2 control-label required']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
                {!! Form::text('first_name', null, ['class' => 'form-control input-sm', 'maxlength' => "15"]) !!}
            </div>
        </div>
        
         {!! Form::label('last_name', @trans('common.last_name').':', ['class' => 'col-sm-2 control-label required']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
                {!! Form::text('last_name', null, ['class' => 'form-control input-sm', 'maxlength' => "15"]) !!}
            </div>
        </div>


    </div>
    
    <!--  Date of Birth, Email Form Input -->
    <div class="form-group">
        {!! Form::label('date_of_birth', @trans('clients.date_of_birth').':', ['class' => 'col-sm-2 control-label required required']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
                {!! Form::text('date_of_birth', ( isset($d_o_b) ? $d_o_b : null), ['class' => 'form-control input-sm date-picker']) !!}
            </div>
        </div>

        {!! Form::label('email', @trans('clients.email').':', ['class' => 'col-sm-2 control-label required']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
                {!! Form::email('email', null, ['class' => 'form-control input-sm']) !!}
            </div>
        </div>

    </div>


    <!-- status, gender Form Input -->
    <div class="form-group">
        
        {!! Form::label('office', @trans('clients.address').':', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
                {!! Form::text('address', null, ['class' => 'form-control input-sm']) !!}
            </div>
        </div>
        
        {!! Form::label('gender', @trans('clients.gender').':', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
                <select name="gender" id="gender" class="form-control input-sm selectpicker">
                @if(isset($client->gender) && $client->gender == 'M')
                    <option value="M" selected="selected">@lang('clients.male')</option>
                    <option value="F">@lang('clients.female')</option>
                @elseif(old('gender') != '')
                    <option value="M" @if(old('gender') == 'M') selected="selected" @endif  >@lang('clients.male')</option>
                    <option value="F" @if(old('gender') == 'F') selected="selected" @endif>@lang('clients.female')</option>
                @else
                    <option value="M">@lang('clients.male')</option>
                    <option value="F" selected="selected">@lang('clients.female')</option>
                @endif
                </select>
            </div>
        </div>
    </div>

     <!-- Country, Mobile Form Input -->
    <div class="form-group">
        {!! Form::label('country', @trans('common.country').':', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
                {!! Form::select('country', $countries, null, ['class' => 'form-control input-sm selectpicker']) !!}
            </div>
        </div>

        {!! Form::label('mobile', @trans('clients.mobile').':', ['class' => 'col-sm-2 control-label required']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
                {!! Form::text('mobile', null, ['class' => 'form-control input-sm']) !!}
            </div>
        </div>
        
    </div>

    

    <!-- Created On Form Input -->
    @if(!empty($client->created_at) && !empty($client->created_by))
    <div class="form-group ">
         {!! Form::label('created_at', @trans('common.created_on').':', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
            {!! Form::label('created_at', $client->created_at . ' '. @trans('common.by').': ' .  $client->created_by, ['class' => 'control-label']) !!}
            </div>
        </div>
    </div>
    @endif

    <!-- Last Updated Form Input -->
    @if(!empty($client->updated_at) && !empty($client->updated_by))
    <div class="form-group top">
         {!! Form::label('updated_at', @trans('common.last_update').':', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
            {!! Form::label('updated_at', $client->updated_at .  ' '.@trans('common.by').': '  .  $client->updated_by, ['class' => 'control-label']) !!}
            </div>
        </div>
    </div>
    @endif

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary btn-sm">@lang('common.save')</button>
            <a class="btn btn-info btn-sm" href="{{ route('profile.edit') }}">@lang('common.back')</a>
        </div>
    </div>
</div>


<script type="text/javascript">
            $(function () {
                $('.date-picker').datetimepicker({
                    locale: 'ru'
                });
            });
        </script>