<?php

namespace App\Http\Controllers;

use App\Models\Cocktails;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function index()
    {
        $cocktails = Cocktails::all();
        return view('cocktails.index', compact('cocktails'));
    }

    // Altre azioni come show, create, store, ecc.
}
