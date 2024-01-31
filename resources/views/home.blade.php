@extends('layouts.app')

@section('content')
    <div class="container text-center py-4">
        <h1>Dai un occhio ai nostri cocktail</h1>
        <a class="btn btn-primary mt-5" href="{{ route('cocktails.index') }}">ACCEDI</a>
    </div>
@endsection
