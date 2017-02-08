@extends('app')

@section('content')
    <div class="card">

       
        <div class="card-header">
            <h2><i class="md md-security"></i> Secuirty Setting</h2>
        </div>

        <div class="card-body card-padding">

        @include('partials.form-errors')

        {!! Form::model($secuirty, ['method' => 'put', 'url' => '/secuirty/' . $secuirty->id, 'class' => 'form-horizontal']) !!}

        <div class="card-body card-padding">

            <!-- Lock app Form Input -->
            <div class="row">            	 
	            <div class="col-sm-6">
		            <div class="form-group">
		            	<label>Sign out of when user has not used it for: (Minutes)</label>
		                <div class="fg-line">
		                	{!! Form::input('number', 'lock_app', null, ['class' => 'form-control input-sm', 'placeholder' => 'Minutes']) !!}
		            	</div>
		            </div>
	            </div>
	            
            </div>

            <!-- Deactivated Form Input -->
            <div class="row">
	            <div class="col-sm-6">
		            <div class="form-group">
        				<label>Deactivate Application when user has not signed in for: (Months)</label>
		                <div class="fg-line">
		                    {!! Form::input('number', 'deactive_app', null, ['class' => 'form-control input-sm', 'placeholder' => 'Months']) !!}
		                </div>
		            </div>
	            </div>
            </div>
			
			<div class="row">
            	<p><strong>Last updated:</strong> {{ $secuirty->updated_at}} <strong>By:</strong> {{ $secuirty->updated_by }}</p>
			</div>
            
            <div class="row">
	            <div class="form-group">
	                <div class="col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
	                    <a class="btn btn-info btn-sm" href="{{ url('settings') }}">Back</a>
	                </div>
	            </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

    </div>
@endsection
