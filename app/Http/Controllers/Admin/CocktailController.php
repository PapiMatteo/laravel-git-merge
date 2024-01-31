<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCocktailRequest;
use App\Http\Requests\UpdateCocktailRequest;
use App\Models\Cocktail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CocktailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cocktails = Cocktail::all();

        return view('cocktails.index', compact('cocktails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cocktails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCocktailRequest $request)
    {
        $form_data = $request->validated();
        $cocktail = new Cocktail();
        if ($request->hasFile('image')) {
            $img_path = Storage::put('cocktails_images', $request->image);
            $cocktail->image = $img_path;
        }
        $cocktail->fill($form_data);

        $cocktail->save();
        return redirect()->route('cocktails.show', ['cocktail'=> $cocktail->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cocktail $cocktail)
    {
        return view('cocktails.show', compact('cocktail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cocktail $cocktail)
    {
        return view('cocktails.edit', compact('cocktail'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCocktailRequest $request, Cocktail $cocktail)
    {
        $form_data = $request->validated();
        $cocktail->update($form_data);

        return redirect()->route('cocktails.show', ['cocktail' => $cocktail->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cocktail $cocktail)
    {
        $cocktail->delete();
        Storage::delete($cocktail->image);

        return redirect()->route('cocktails.index')->with('message', "$cocktail->name è stato cancellato!");
    }
}
