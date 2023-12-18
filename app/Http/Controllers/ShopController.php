<?php

namespace App\Http\Controllers;
use App\Models\article;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ShopController extends Controller
{
  

    public function index(): View
    {
        
        


        $articleData['articleData'] = article::all();
        return view('shop',compact('articleData'));
    }

    
}
