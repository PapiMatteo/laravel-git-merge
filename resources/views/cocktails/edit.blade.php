@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="row">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1>MODIFICA COCKTAIL</h1>
                        {{-- Back Button --}}
                        <a class="btn btn-primary"
                            href="{{ route('cocktails.show', ['cocktail' => $cocktail->slug]) }}">BACK</a>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('cocktails.update', ['cocktail' => $cocktail->slug]) }}" method="POST">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" id="name" name="name"
                                    value="{{ old('name', $cocktail->name) }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="price">Prezzo:</label>
                                <input type="number" id="price" name="price"
                                    value="{{ old('price', $cocktail->price) }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="glass_type">tipo di Bicchiere:</label>
                                <input type="text" id="glass_type" name="glass_type"
                                    value="{{ old('glass_type', $cocktail->glass_type) }}" class="form-control">
                            </div>

            <div class="form-group">
                <label for="instruction" class="form-label">Preparazione:</label>
                <textarea class="form-control" id="instruction" rows="7"
                    name="instruction">{{ old('instruction', $cocktail->instruction) }}</textarea>
            </div>

            <div class="mb-3">
                <h4>Seleziona gli ingredienti</h4>

                @foreach ($ingredients as $ingredient)
                    <input @checked($errors->any() ? in_array($ingredient->id, old('ingredients', [])) : $cocktail->ingredients->contains('ingredient')) type="checkbox" name="ingredients[]" id="ingredients-{{ $ingredient->id }}" value="{{ $ingredient->id }}">
                    <label for="ingredients-{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                @endforeach

                @error('ingredients')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection
