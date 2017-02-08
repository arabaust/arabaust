 <div class="card-body card-padding">
    @include('partials.form-errors')

    {!! Form::model(['method' => 'POST', 'url' => route('settings.updateAbout'), 'class' => 'form-horizontal', 'files' => true ]) !!}

    {!! csrf_field() !!}
    <!-- language tape Form Input -->
    <div class="form-group">

            <div class="card-body container">
      

              <!-- title Form Input -->
		    <div class="form-group">
		        {!! Form::label('title', @trans('common.title').':', ['class' => 'col-sm-2 control-label required ']) !!}
		        <div class="col-sm-4">
		            <div class="fg-line">
		                {!! Form::text('title', null, ['class' => 'form-control input-sm', 'maxlength' => "40"]) !!}
		            </div>
		        </div>
		        </div>
		          <!-- description Form Input -->
		    <div class="form-group">
		        {!! Form::label('description', @trans('common.description').':', ['class' => 'col-sm-2 control-label required ']) !!}
		        <div class="col-sm-4">
		            <div class="fg-line">
		                {!! Form::text('description', null, ['class' => 'form-control input-sm', 'maxlength' => "40"]) !!}
		            </div>
		        </div>
		        


		    </div>
		    

			<!-- image Form Input -->
		    <div class="form-group">
		        {!! Form::label('image', @trans('about_us.image').' :', ['class' => 'col-sm-2 control-label ']) !!}
		        @if(!empty($aboutus->image))
		            <div class="col-sm-3">
		                <div class="fg-line">
		                    {!! Form::text('image', null, ['class' => 'form-control input-sm', 'disabled' => 'disabled']) !!}
		                </div>
		            </div>
		            <div class="col-md-1">
		                @if(!empty($aboutus->image))
		                    @if(is_dir(public_path() . '/files/aboutus/' . $aboutus->id))
		                        <a class="btn btn-info btn-sm" href="{{ asset('/files/aboutus/' . $aboutus->id . '/' . $aboutus->image) }}" target="_blank">@lang('common.view')</a>
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

   {!! Form::close() !!}
  

	  <!-- Save button Input -->


                <div class="form-group ">
                        <div class="col-sm-offset-2 col-sm-10">
				            <button type="submit" class="btn btn-primary btn-sm">@lang('common.save')</button>
				            <a class="btn btn-info btn-sm" href="{{ redirect()->back()->getTargetUrl()  }}">@lang('common.back')</a>
				        </div>
                </div>

 		

            </div>
        </div>
    </div>

    </div>

   
</div>


