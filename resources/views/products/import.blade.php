
@extends('app')

@section('content')
    <div class="block-header">
        <h2>
        <li class="zmdi zmdi-upload"></li>

        @lang('products.import')</h2>
    </div>
    <div class="card">
        <div class="text-center">
        </div>
        <div class="card-body card-padding">
            <div class="pmbb-body p-l-30 p-t-30">
                <div class="pmbb-view">
                    <div class="row">
                        @include('partials.form-errors')
                        
                        <div class="col-md-12">

                            {!! Form::open(['method' => 'POST', 'url' => route('products.store_import'), 'class' => 'form-horizontal', 'files' => true ]) !!}
                            
                                <div class="form-group">   
                                    {!! Form::label('Image', @trans('common.upload').':', ['class' => 'col-sm-1 control-label required']) !!}
                                    <div class="col-sm-9">
                                        <div class="form-control input-sm">
                                          <input type="file"  name="excel"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-sm-offset-1 col-sm-10 ">
                                        <button type="submit" class="btn btn-primary btn-sm">@lang('common.save')</button>
                                        <a class="btn btn-info btn-sm" href="{{ URL::previous() }}">@lang('common.back')</a>
                                    </div>
                                </div>

                            {!! Form::close() !!}

                        </div>
                    </div>   
                  </div>
                </div>
            </div>
        </div>
    </div>

@endsection
