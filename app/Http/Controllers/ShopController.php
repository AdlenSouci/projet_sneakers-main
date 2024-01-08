<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ShopController extends Controller
{
    public function index(): View
    {
        $articlesData = Article::all();
        return view('shop', compact('articlesData'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Ajoutez ici la logique pour rechercher les articles en fonction de la requête
       
        // Logique pour rechercher les articles dont le modèle commence par la requête
        $articlesData = Article::where('modele', 'like', $query . '%')->get();
        return view('shop', compact('articlesData'));
    }
}