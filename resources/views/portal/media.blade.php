@extends('portal.layout.main')


@section('content')
<div class="container-fluid mainImg-block">
  <div class="imgBlock">
    <img src="/img/O6VMJU0.jpg" />
  </div><!--imgBlock-->
  <div class="container">
  <div class="mainNews_block">

  @foreach( $media as $key=>$value )



    <div class="col-lg-3 col-md-3 col-sm-3">

      <h1>{{ $value->title }}</h1>
<img class="imgUrl" data-vid="//www.youtube.com/embed/{{get_youtubeid($value->url)}}" src="https://img.youtube.com/vi/{{get_youtubeid($value->url)}}/0.jpg" data-toggle="modal" data-target="#myModal">


  <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">{{ $value->title }}</h4>


                </div>
                <div class="modal-body cartoonVideo">
                    <iframe data-video="{{get_youtubeid($value->url)}}" class="" id="cartoonVideo" width="560" height="315" src="//www.youtube.com/embed/{{get_youtubeid($value->url)}}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>


    </div>
@endforeach
    
  </div><!--mainNews_block-->  

</div><!--container-->
</div>
<script>
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */

    var url = $("#cartoonVideo").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal").on('hide.bs.modal', function(){
        $("#cartoonVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    /*$("#myModal").on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });*/
    $(".imgUrl").click(function(){
       var urlVideo=$(this).data("vid");
       $("#cartoonVideo").attr('src', urlVideo);
    })
 
});
</script>
@endsection

