<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;

use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function index()
    {
        $cocktails = Cocktail::all();
        return view('cocktails.index', compact('cocktails'));
    }

    // Altre azioni come show, create, store, ecc.
}
