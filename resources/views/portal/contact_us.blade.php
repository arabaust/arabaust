@extends('portal.layout.main')


@section('content')
<div class="container-fluid mainImg-block">
  <div class="imgBlock">
    <img src="/img/O6VMK00.jpg" />
  </div><!--imgBlock-->

     @include('partials.form-errors')
 
     {!! Form::open(['method' => 'POST', 'url' => route('contact_us.store'),'files' => true , 'class' => 'form-horizontal']) !!}
    
 
     {!! csrf_field() !!}
 
  <div class="container">
<div class="col-lg-12">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact us </h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            {!! Form::text('title', null, ['class' => 'form-control input-sm', 'maxlength' => "15"]) !!}

                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                {!! Form::text('email', null, ['class' => 'form-control input-sm', 'maxlength' => "30"]) !!}
          </div>
                        </div>
                        <div class="form-group">
                            <label for="name">
                                phone</label>
                            {!! Form::text('phone', null, ['class' => 'form-control input-sm', 'maxlength' => "15"]) !!}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                 {!! Form::textarea('description', null, ['class' => 'form-control input-sm', 'maxlength' => "15"]) !!}

                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
            </form>
        </div>
    </div>
</div>
  </div><!--container-->
     {!! Form::close() !!}

</div>
@endsection




