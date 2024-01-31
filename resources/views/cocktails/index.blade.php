@extends('layouts.app')

@section('content')

<div class="container py-5">
    
    @if (session('message'))
        <div class="alert alert-info my-3">
            {{ session('message') }}
        </div>
    @endif

    <h1 class="text-center">LISTA DEI COCKTAILS</h1>
    <div class="text-end">
        <a class="btn btn-primary my-3" href="{{ route('cocktails.create') }}">Crea un nuovo cocktail</a>
    </div>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Tipologia di Bicchiere</th>
                <th scope="col">Azioni</th> <!-- Nuova colonna per le azioni -->
            </tr>
        </thead>
        <tbody>
            @foreach ($cocktails as $cocktail)
                <tr>
                    <th scope="row">{{ $cocktail->name }}</th>
                    <td>{{ $cocktail->price . ',00' . ' €' }}</td>
                    <td>{{ $cocktail->glass_type }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('cocktails.show', ['cocktail' => $cocktail->slug]) }}">Dettagli</a>
                        <form action="{{ route('cocktails.destroy', ['cocktail' => $cocktail->slug]) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancella</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
