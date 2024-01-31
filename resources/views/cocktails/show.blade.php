@extends('layouts.app')

@section('content')
    {{-- Project Details --}}
    <div class="container fs-5 py-5">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2>{{ $cocktail->name }}</h2>
                <p>{{ $cocktail->slug }}</p>
            </div>
            {{-- Back Button --}}
            <a href="{{ route('cocktails.index') }}" class="btn btn-primary float-end">BACK</a>
        </div>
        <hr>
        <div>
            @if (Str::isUrl($cocktail->image))
                <img style="max-width:600px;" src="{{ $cocktail->image }}" alt="">
            @else
                <img style="max-width:600px;" src="{{ asset('storage/' . $cocktail->image) }}" alt="">
            @endif
        </div>
        <hr>
        <div class="mt-4">
            <strong>Prezzo:</strong>
            {{ $cocktail->price . ',00' . '€' }}
        </div>

        <div class="mt-4">
            <strong>Ingredienti:</strong>
            <ul>
                @foreach ($cocktail->ingredients as $ingredient)
                    <li>{{ $ingredient->name }}</li>
                @endforeach

            </ul>
        </div>

        @if ($cocktail->instruction)
            <div class="mt-4">
                <strong>Istruzioni:</strong>
                {{ $cocktail->instruction }}
            </div>
        @endif
        <div class="mt-4">
            <strong>Tipo di bicchiere:</strong>
            {{ $cocktail->glass_type }}
        </div>
        <hr>
        <div>
            <a class="btn btn-warning mt-4 px-5"
                href="{{ route('cocktails.edit', ['cocktail' => $cocktail->slug]) }}">EDIT</a>
        </div>
    </div>
@endsection
