<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function confirmOrder(Request $request)
    {
        // Vous pouvez récupérer l'utilisateur actuellement connecté
        $user = auth()->user();

        // Implémentez ici la logique pour confirmer la commande et retourner le pseudo de l'utilisateur
        return response()->json(['username' => $user->name]);
    }

    public function showOrderConfirmation()
    {
        return view('order_confirmation');
    }
}
