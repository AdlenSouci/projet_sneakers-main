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

        // Récupérez les tailles associées à cet article
        $tailles = $article->tailles->pluck('taille');

        // Passez l'article et les tailles à la vue et affichez-le sur la page
        return view('article', ['article' => $article, 'tailles' => $tailles]);
    }

    public function index()
{
    $articles = Article::all();
    return view('indexCrud', compact('articles'));
}


    public function showCrudA($id)
    {
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    // Nouvelle méthode pour enregistrer un nouvel article
    public function store(Request $request)
    {
        // Validez les données du formulaire

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    // Nouvelle méthode pour afficher le formulaire de modification d'article
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    // Nouvelle méthode pour mettre à jour un article existant
    public function update(Request $request, $id)
    {
        // Validez les données du formulaire

        $article = Article::find($id);
        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    // Nouvelle méthode pour supprimer un article
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
