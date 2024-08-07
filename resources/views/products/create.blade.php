@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un produit</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image du produit</label>
            <input class="form-control" type="file" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
