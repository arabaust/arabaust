@extends('app')

@section('content')
    <div class="card">

       
        <div class="card-header">
            <h2><i class="zmdi zmdi-file-text zmdi-hc-fw"></i> @lang('terms.page_title') </h2>
        </div>

        <div class="card-body card-padding">

        @include('partials.form-errors')

        {!! Form::model($terms, ['method' => 'put', 'url' => route('settings.terms').'/' . $terms->id, 'class' => 'form-horizontal']) !!}

        <div class="card-body card-padding">
			
            <!-- Terms & Conditions Form Input -->
            <div class="row">            	
	            <div class="col-sm-12">
		            <div class="form-group">
		            	<label>@lang('terms.terms_description'):</label>
		                <div class="fg-line">
		                	{!! Form::textarea('terms', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
		            	</div>
		            </div>
	            </div>
            </div>
			
			<div class="row">
            	<p><strong>@lang('common.last_update'):</strong> {{ $terms->updated_at}} <strong>@lang('common.by'):</strong> {{ $terms->updated_by }}</p>
			</div>
            
            <div class="row">
	            <div class="form-group">
	                <div class="col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">@lang('common.save')</button>
<!--	                    <a class="btn btn-info btn-sm" href="{{ url('settings') }}">Back</a>-->
	                </div>
	            </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

    </div>
@endsection
