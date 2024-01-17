@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Tempo di Preparazione</th>
                <th scope="col">Tipologia di Bicchiere</th>
                <th scope="col">Difficolta Preparazione</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cocktails as $cocktail)
                <tr>
                    <th scope="row">{{ $cocktail->name }}</th>
                    <td>{{ $cocktail->price . ',00' . ' €' }}</td>
                    <td>{{ $cocktail->prep_time . ' min' }}</td>
                    <td>{{ $cocktail->glass_type }}</td>
                    <td>{{ ucFirst($cocktail->prep_difficulty) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
