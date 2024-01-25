@extends('layouts.app')

@section('content')
@if (session('message'))
    <div class="alert alert-info my-3">
        {{ session('message') }}
    </div>
@endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Ingredienti</th>
                <th scope="col">Tipologia di Bicchiere</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cocktails as $cocktail)
                <tr>
                    <th scope="row">{{ $cocktail->name }}</th>
                    <td>{{ $cocktail->price . ',00' . ' €' }}</td>
                    <td>{{ $cocktail->ingredient }}</td>
                    <td>{{ $cocktail->glass_type }}</td>
                    <td>
                        <a class="btn btn-success"
                                    href="{{ route('cocktails.show', ['cocktail' => $cocktail->slug]) }}">Dettagli</a>
                        <form action="{{ route('cocktails.destroy', ['cocktail' => $cocktail->slug]) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
