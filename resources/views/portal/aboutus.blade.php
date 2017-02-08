@extends('portal.layout.main')


@section('content')
<div class="container-fluid mainImg-block">
  <div class="imgBlock">
    <img class="img-responsive" src="{{ asset('/files/about_us/' . $aboutus->id . '/' . $aboutus->image) }}" alt="{{ $aboutus->name }}" >                  </ul>
  </div><!--imgBlock-->
  <div class="container">
    <div class="titleBlock"><h1>About Us</h1></div>
      <div class="description_Block">
        <div id="pop-open-{{$aboutus->id}}" class="zoom-anim-dialog mfp-hide pop-open-style">
            <!--  Image -->
                <!-- Personal Info -->
                <div class="personal-info">
                    <div class="col-sm-8">{{ $aboutus->about }}</div>
               
              <hr>

          </div>
      </div><!--description_Block-->
  </div><!--container-->

</div>
@endsection