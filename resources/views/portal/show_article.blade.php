@extends('portal.layout.main')


@section('content')


  <div class="container" id="show_article">
           <div class="row">
              <div class="col-sm-12 col-xs-12 col-md-12">
                 <main class="post-single">
                        <img   class="img-responsive" src="{{ asset('/files/articles/' . $article->id . '/' . $article->image) }}" alt="{{ $article->name }}" >

                             <div class="post-inner">   
                                 <div class="post-title-wrap">
                                     <h1 class="post-title"  >{{ $article[App::getLocale().'_title']}}</h1>
                                  </div>
                                  <div class="post-editor clearfix">
                                        <p>
                                           {!! $article[App::getLocale().'_description_article'] !!} 
                                        </p>
                                  </div>
                          
                           
                       
                               </div>
                 </main>
              </div>
           </div>
           
           <div class="">                      
                  <a class="btn btn-info btn-sm" href="{{ route('portal.article') }}">@lang('common.back')</a>
           </div>
  </div>



 


 <ul class="pager">
     <li>     
          @if(isset($previous))
          <a href="{{ route( 'portal.show', $previous ) }}">Previous</a>
          @endif
    <li>
    <li>
         @if(isset($next))
         <a href="{{ route( 'portal.show', $next ) }}">Next</a>
         @endif
    </li>
</ul>
@endsection



