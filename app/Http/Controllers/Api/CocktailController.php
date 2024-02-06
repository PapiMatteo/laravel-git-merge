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

    public function show(string $slug){
        $cocktail = Cocktail::with('ingredients')->where('slug', $slug)->first();

        if($cocktail){
            return response()->json([
                'results' => $cocktail,
                'success' => true
            ]); 
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Impossibile trovare il cocktail'
            ]);
        }

        
    }

}
