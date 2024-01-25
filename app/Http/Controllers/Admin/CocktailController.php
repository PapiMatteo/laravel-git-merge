<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cocktails = Cocktail::all();

        return view('admin.cocktails.index', ['cocktails' => $cocktails]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cocktails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $cocktail = Cocktail::where('slug', $slug)->firstOrFail();

        return view('admin.cocktails.show', ['cocktail' => $cocktail]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCocktailRequest, Cocktail $cocktail)
    {
        $form_data = $request->validated();
        $cocktail->update($form_data);

        return redirect()->route('admin.cocktails.show', ['cocktail' => $cocktail->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cocktail $cocktail)
    {
        $cocktail->delete();

        return redirect()->route('cocktails.index')->with('message', "$cocktail->name has been deleted");
    }
}
