@extends('layouts.app')

@section('content')


    {{-- Project Details --}}
    <div class="container fs-5">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2>{{ $cocktail->name }}</h2>
                <p>{{ $cocktail->slug }}</p>
            </div>
            {{-- Back Button --}}
            <a href="{{ route('cocktails.index') }}" class="btn btn-primary float-end">BACK</a>
        </div>
        @if ($cocktail->image)
        <div>
            <img style="max-width:600px;" src="{{ $cocktail->image }}" alt="">
        </div>
        @endif
        <hr>
        <div class="mt-4">
            <strong>Prezzo:</strong>
            {{ $cocktail->price . '€' }}
        </div>
        <div class="mt-4">
            <strong>Ingredienti:</strong>
            {{ $cocktail->ingredient . '€' }}
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
