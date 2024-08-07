@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le produit</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image du produit</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
