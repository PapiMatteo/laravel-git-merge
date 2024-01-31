@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1>Modifica Cocktail</h1>

        <form action="{{ route('cocktails.update', ['cocktail' => $cocktail->slug]) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $cocktail->name) }}" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="price">Prezzo:</label>
                <input type="number" id="price" name="price" value="{{ old('price', $cocktail->price) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="ingredient">Ingredienti:</label>
                <input type="text" id="ingredient" name="ingredient" value="{{ old('ingredient', $cocktail->ingredient) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="glass_type">tipo di Bicchiere:</label>
                <input type="text" id="glass_type" name="glass_type" value="{{ old('glass_type', $cocktail->glass_type) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="instruction" class="form-label">Preparazione:</label>
                <textarea class="form-control" id="instruction" rows="7"
                    name="instruction">{{ old('instruction', $cocktail->instruction) }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection
