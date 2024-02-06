<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function index() {
        $cocktails = Cocktail::with('ingredients')->get();
        return response()->json([
            'results' => $cocktails,
            'success' => true
        ]);
    }
}
