@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Crea un nuovo cocktail</h1>

        <div class="row justify-content-center mt-5">
            <div class="col-6 mb-5">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('cocktails.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="text" class="form-control" id="image" name="image"
                            value="{{ old('image') }}">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" class="form-control" id="price" name="price"
                            value="{{ old('price') }}">
                    </div>

                    <div class="mb-3">
                        <label for="glass_type" class="form-label">Tipologia bicchiere</label>
                        <input type="text" class="form-control" id="glass_type" name="glass_type"
                            value="{{ old('glass_type') }}">
                    </div>

                    <div class="mb-3">
                        <label for="ingredient" class="form-label">Ingredienti</label>
                        <input type="text" class="form-control" id="ingredient" name="ingredient"
                            value="{{ old('ingredient') }}">
                    </div>

                    <div class="mb-3">
                        <label for="instruction" class="form-label">Istruzioni</label>
                        <textarea class="form-control" name="instruction" id="instruction" cols="30" rows="10"></textarea>
                    </div>

                    <button class="btn btn-success" type="submit">Salva</button>

                </form>
            </div>
        </div>

    </div>
@endsection