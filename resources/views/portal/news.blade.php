@extends('portal.layout.main')


@section('content')
<div class="container-fluid mainImg-block">
  <div class="imgBlock">
    <img src="/img/O6VMJU0.jpg" />
  </div><!--imgBlock-->
  <div class="container">
  <div class="mainNews_block">


  @foreach( $news as $new )

    <div class="newsMain_Block">
    <div class="col-lg-8 col-md-8 col-sm-8">
      <h1>{!!( $new->en_title) !!}</h1>
      <div class="date_block">{{ ($new->publish_date) }}</div><!--date_block-->
        <div class="description">
         {!!($new->en_description) !!}
        </div><!--description-->
        <div class="description">
         {{ $new->seo_url }}
        </div>

        </div>

    <div class="newsImg_block col-lg-4 col-md-4 col-sm-4">
      <img class="img-responsive" src="{{ asset('/files/news/' . $new->id . '/' . $new->image) }}" alt="{{ $new->name }}" >
    </div><!--newsImg_block-->  
    </div>

@endforeach
  </div><!--mainNews_block-->  
</div><!--container-->
</div>
@endsection