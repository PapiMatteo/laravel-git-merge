@extends('layouts.app')

@section('content')
    <div class="container py-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1>CREA UN NUOVO COCKTAIL</h1>
                        {{-- Back Button --}}
                        <a href="{{ route('cocktails.index') }}" class="btn btn-primary float-end">BACK</a>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('cocktails.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label @error('image') is-invalid @enderror">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
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
                                <label for="instruction" class="form-label">Istruzioni</label>
                                <textarea class="form-control" name="instruction" id="instruction" cols="30" rows="10"></textarea>
                            </div>

                            <button class="btn btn-success" type="submit">Salva</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
