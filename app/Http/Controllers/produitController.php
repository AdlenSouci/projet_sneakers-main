<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class produitController extends Controller
{
    /**
     * Display a listing of the resource.
     * produit is modal ( you can take model for enter data in produit table and delete and modify)
     * paginate is using for take number of data
     * contact can create parameter for give in vue index
     */
    public function index(): View
    {
        $produits = Produit::all()->sortBy("nom");
        return view("produits.index", compact("produits"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => 'required',

        ]);
        Produit::create($request->all());
        return redirect()->route("produits.index")->with('success', 'Produit créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit): View
    {

        return view("produits.show", compact("produit"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required',

        ]);
        $produit->update($request->all());
        return redirect()->route("produits.index")->with('success', 'Produit modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit): RedirectResponse
    {
        $produit->delete();
        return redirect()->route("produits.index")->with('success', 'Produit supprimé avec succès');
    }
}
