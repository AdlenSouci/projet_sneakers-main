<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\TaillesArticle;




class ArticleController extends Controller
{
    public function show($id)
    {
        // Récupérez l'article depuis la base de données en fonction de l'ID
        $article = Article::find($id);

        //$tailles = Taille::find($id);
        $tailles = $article->tailles();
        // Passez l'article à la vue et affichez-le sur la page
        return view('article', ['article' => $article] , ['tailles' => $tailles]);
    }

}
