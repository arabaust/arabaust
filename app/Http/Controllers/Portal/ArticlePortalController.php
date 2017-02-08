<?php

namespace Admailer\Http\Controllers\portal;
use Illuminate\Http\Request;
use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;
use Admailer\Creators\ArticleCreator;
use Admailer\Repositories\ArticleRepository;
use Admailer\Http\Requests\ArticleRequest;
use Admailer\Http\Requests\UpdateArticleRequest;
use Admailer\Models\Article;
use DB ;



class ArticlePortalController extends Controller
{

    /**
     * @var ArticleRepository
     */
    private $articlerepository;
    /**
     * @var ArticleCreator
     */
    private $articlecreator;

    public function __construct(ArticleRepository $articlerepository,
                                ArticleCreator $articlecreator)
    { 

        $this->articlerepository = $articlerepository;
        $this->articlecreator    = $articlecreator;
        // $this->middleware('is.allowed');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

          $articles =  Article::paginate(8);
        return view('portal.article',compact('articles'));
    }


     public function show($id)
     {
        $article = Article::findOrFail($id);
        $previous = Article::where('id', '<', $article->id)->max('id');
        $next = Article::where('id', '>', $article->id)->min('id');
        return view('portal.show_article' , compact('article','previous','next'));
     }

   
}
