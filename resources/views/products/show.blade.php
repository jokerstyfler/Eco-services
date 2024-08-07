@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center my-5">
        <h1>{{ $product->name }}</h1>
        <img src="{{ asset('storage/images/' . basename($product->image))}}" class="img-fluid product-image" alt="{{ $product->name }}">
        <p class="mt-4">{{ $product->description }}</p>
        <p><strong>{{ $product->price }} €</strong></p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Retour</a>
    </div>
</div>
@endsection

@section('styles')
<style>
    .product-image {
        max-width: 100%;
        height: auto;
        max-height: 400px; /* Ajustez la hauteur selon vos besoins */
        object-fit: cover;
    }
</style>
@endsection
