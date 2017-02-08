@extends('app')

@section('content')
    <div class="card">

       
        <div class="card-header">
            <h2><i class="zmdi zmdi-info-outline zmdi-hc-fw"></i> @lang('about.page_title')</h2>
        </div>

        <div class="card-body card-padding">

        @include('partials.form-errors')

        {!! Form::model($about, ['method' => 'put', 'url' => route('settings.about').'/' . $about->id, 'class' => 'form-horizontal', 'files' => true]) !!}

        <div class="card-body card-padding">
            
            <!-- Terms & Conditions Form Input -->
            <div class="row">               
                <div class="col-sm-10">
                    <div class="form-group">
                        <label> @lang('about.en_about_description') :</label>
                        <div class="fg-line">
                            {!! Form::textarea('en_about', null, ['class' => 'form-control summernote' , 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>


            <!-- Terms & Conditions Form Input -->
            <div class="row">               
                <div class="col-sm-10">
                    <div class="form-group">
                        <label> @lang('about.ar_about_description') :</label>
                        <div class="fg-line">
                            {!! Form::textarea('ar_about', null, ['class' => 'form-control summernote' , 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>


<div class="row">               
                <div class="col-sm-12">
            <div class="form-group mode">
                {!! Form::label('image', @trans('products.image').' :') !!}
                    @if(!empty($about->image))
                        <div class="col-sm-3">
                            <div class="fg-line">
                                {!! Form::text('image', null, ['class' => 'form-control input-sm', 'disabled' => 'disabled']) !!}
                            </div>
                        </div>
                        <div class="col-md-1">
                            @if(!empty($about->image))
                                @if(is_dir(public_path() . '/files/about_us/' . $about->id))
                                    <a class="btn btn-info btn-sm" href="{{ asset('/files/about_us/' . $about->id . '/' . $about->image) }}" target="_blank">@lang('common.view')</a>
                                @endif
                            @endif
                        </div>
                        <div class="col-sm-6">
                    @else
                        <div class="col-sm-10">
                    @endif
                        <div class="fg-line">
                            {!! Form::file('image', ['class' => 'form-control input-sm']) !!}
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <p><strong>@lang('common.last_update'):</strong> {{ $about->updated_at}} <strong>@lang('common.by'):</strong> {{ $about->updated_by }}</p>
            </div>
            
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-sm">@lang('common.save')</button>

                    </div>
                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

    </div>
@endsection
