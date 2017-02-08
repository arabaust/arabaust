 <div class="card-body card-padding">

    @include('partials.form-errors')
    
    {!! csrf_field() !!}
    <!--  Form Input -->
    <div class="form-group">

            <div class="card-body container">
                <ul class="tab-nav tn-justified tn-icon" role="tablist">
                    <li role="presentation" class="active">
                        <a class="col-sx-4" href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab" aria-expanded="true">
                            <i class="zmdi  icon-tab">EN</i>
                        </a>
                    </li>
                    <li role="presentation" class="">
                        <a class="col-xs-4" href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab" aria-expanded="false">
                            <i class="zmdi  icon-tab">AR</i>
                        </a>
                    </li>
                </ul>

       <div class="tab-content p-20 container">
          <div role="tabpanel" class=" container tab-pane animated fadeIn active" id="tab-1">
                            
                      <!-- product_name Form Input -->
				    <div class="form-group">
				        {!! Form::label('product_name', @trans('products.product_name').':', ['class' => 'col-sm-2 control-label required ']) !!}
				        <div class="col-sm-10">
				            <div class="fg-line">
				                {!! Form::text('en_name', null, ['class' => 'form-control input-sm', 'maxlength' => "40"]) !!}
				            </div>
				        </div>
				        


				    </div>
				    
				   <!-- description  Form Input -->
				  <div class="form-group">
				        {!! Form::label('description', @trans('common.description').':', ['class' => 'col-sm-2 control-label required ']) !!}
				        <div class="col-sm-10">
				            <div class="fg-line">
				                {!! Form::textarea('en_description', null, ['class' => 'form-control summernote']) !!}
				            </div>
				        </div>
				    </div>




		 </div>

    <div role="tabpanel" class="container tab-pane animated fadeIn" id="tab-2">
                       
		        <!-- product_name Form Input -->
		    <div class="form-group">
		        {!! Form::label('product_name', @trans('products.product_name').':', ['class' => 'col-sm-2 control-label required ']) !!}
		        <div class="col-sm-10">
		            <div class="fg-line">
		                {!! Form::text('ar_name', null, ['class' => 'form-control input-sm', 'maxlength' => "40"]) !!}
		            </div>
		        </div>

		    </div>
		    
		    <!-- description  Form Input -->
		  <div class="form-group">
		        {!! Form::label('description', @trans('common.description').':', ['class' => 'col-sm-2 control-label required ']) !!}
		        <div class="col-sm-10">
		            <div class="fg-line">
		                {!! Form::textarea('ar_description', null, ['class' => 'form-control summernote']) !!}
		            </div>
		        </div>
		    </div>


	 </div>

	

      <!-- status & manufacturer Form Input -->
 	  <div class="form-group">

			 {!! Form::label('status', @trans('products.status').' :', ['class' => 'col-sm-2 control-label required']) !!}
			        <div class="col-sm-4">
			            <div class="fg-line">
			                <select name="status" id="status" class="form-control input-sm selectpicker">
			                    @if(isset($product->status) && $product->status == 1)
			                        <option value="1" selected="selected" >@lang('common.active')</option>
			                        <option value="0">@lang('common.inactive')</option>
			                     @elseif(old('status') != 0)
			                        <option value="1" @if(old('status') == 1) selected="selected" @endif  >@lang('common.active')</option>
			                        <option value="0" @if(old('status') == 0) selected="selected" @endif>@lang('common.inactive')</option>    
			                    @else
			                        <option value="1">@lang('common.active')</option>
			                        <option value="0" selected="selected">@lang('common.inactive')</option>
			                    @endif
			                </select>
			            </div>
			        </div>

      </div>  


	<!-- image Form Input -->
	<div class="form-group">
        {!! Form::label('image', @trans('products.image').' :', ['class' => 'col-sm-2 control-label ']) !!}
        @if(!empty($product->image))
            <div class="col-sm-3">
                <div class="fg-line">
                    {!! Form::text('image', null, ['class' => 'form-control input-sm', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="col-md-1">
                @if(!empty($product->image))
                    @if(is_dir(public_path() . '/files/products/' . $product->id))
                        <a class="btn btn-info btn-sm" href="{{ asset('/files/products/' . $product->id . '/' . $product->image) }}" target="_blank">@lang('common.view')</a>
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

	   		    	 		  <!-- Save button Input -->


                <div class="form-group ">
                        <div class="col-sm-offset-2 col-sm-10">
				            <button type="submit" class="btn btn-primary btn-sm">@lang('common.save')</button>
				            <a class="btn btn-info btn-sm" href="{{ redirect()->back()->getTargetUrl()  }}">@lang('common.back')</a>
				        </div>
                </div>




    <!-- Created On Form Input -->
    @if(!empty($product->created_at) && !empty($product->created_by))
    <div class="form-group ">
         {!! Form::label('created_at', @trans('common.created_on').':', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
            {!! Form::label('created_at', $product->created_at . ' '. @trans('common.by').': ' .  $product->created_by, ['class' => 'control-label']) !!}
            </div>
        </div>
    </div>
    @endif

    <!-- Last Updated Form Input -->
    @if(!empty($product->updated_at) && !empty($product->updated_by))
    <div class="form-group top">
         {!! Form::label('updated_at', @trans('common.last_update').':', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <div class="fg-line">
            {!! Form::label('updated_at', $product->updated_at .  ' '.@trans('common.by').': '  .  $product->updated_by, ['class' => 'control-label']) !!}
            </div>
        </div>
    </div>
    @endif

            </div>
        </div>
    </div>

    </div>

   
</div>