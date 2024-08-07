@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Catalogue des produits</h1>
        @auth
        @can('create service')
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
            Ajouter un produit
        </button>
        @endcan
        @endauth
    </div>

    <div class="row">
        @if($products->isEmpty())
        <p>Aucun produit n'est disponible pour le moment.</p>
        @else
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <!-- Affichage de l'image -->
                <img src="{{ asset('storage/images/' . basename($product->image))}}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <!-- Affichage de la description tronquée -->
                    <p class="card-text description">{{ \Illuminate\Support\Str::limit($product->description, 200, '...') }}</p>
                    <p class="card-text"><strong>{{ $product->price }} €</strong></p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Voir le produit</a>
                        @can('edit product', $product)
                        <div class="d-flex">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning me-2">Éditer</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Ajouter un produit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Prix</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .product-image {
        height: 200px;
        object-fit: cover;
    }

    .description {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
@endsection
