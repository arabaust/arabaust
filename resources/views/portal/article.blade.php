

@extends('portal.layout.main')


@section('content')

<div class="container" style="margin-top: 100px; height: auto">
    <div class="row" >
       @foreach($articles as $article)
        <div   class="col-xs-6 col-sm-6 col-md-3" >
            <div class="thumbnail" style="position: relative;
        padding: 10px;
        margin-bottom: 20px; 
        height: 400px;">
                <img class="img-responsive" src="{{ asset('/files/articles/' . $article->id . '/' . $article->image) }}" style="height: 200px; width: 400px;" alt="{{ $article->name }}" >
                <div class="caption">
                    <h2 class="text-center">{{  $article[App::getLocale().'_title']}}</h2>
                       
                        <p>{!! str_limit($article[App::getLocale().'_description_article'],50)!!}</p>

                        <a class="" href="article/{{ $article->id }}/show" data-row-id="{{ $article->id }}">
                          Read More
                         </a>
                  </div>  
                
                    <h6 class="" style="text-align: left;">@lang('Article.Date_created')</h6>
                    <h6 class="" style="text-align: left;">{{  $article['created_at']}} </h6>
               
                
            </div>  
          </div>
        @endforeach


      </div>
    <div style="width: 100% ; text-align: center;" > {!! $articles->render() !!} </div>
  </div>    


@endsection