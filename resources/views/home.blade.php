@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Introduction -->
    <div class="mb-4">
        <h2>Présentation de la Démarche Zéro Déchet</h2>
        <p>Notre objectif est de réduire l'impact environnemental en adoptant des pratiques zéro déchet. Cela implique de minimiser les déchets à travers le réemploi, le recyclage, et l'utilisation de produits durables. Découvrez comment nous contribuons à un avenir plus propre et plus durable.</p>
    </div>

    <!-- Types de Produits Écoresponsables -->
    <h2>Nos Types de Produits Écoresponsables</h2>
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-3 mb-4">
            <div class="card card-fixed-height">
                <img src="{{ asset('images/reutilisables.jpg') }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Produit Réutilisable">
                <div class="card-body">
                    <h5 class="card-title">Produits Réutilisables</h5>
                    <p class="card-text">Les produits réutilisables aident à réduire les déchets en permettant une utilisation multiple. Parmi eux, vous trouverez des sacs réutilisables, des bouteilles en inox, et des contenants en verre, parfaits pour remplacer les articles jetables.</p>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-3 mb-4">
            <div class="card card-fixed-height">
                <img src="{{ asset('images/compostables.jpg') }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Produit Compostable">
                <div class="card-body">
                    <h5 class="card-title">Produits Compostables</h5>
                    <p class="card-text">Les produits compostables se décomposent naturellement et enrichissent le sol. Ils incluent des sacs compostables, des emballages en bioplastique, et d'autres produits conçus pour réduire l'impact sur les sites d'enfouissement.</p>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-3 mb-4">
            <div class="card card-fixed-height">
                <img src="{{ asset('images/recycle.jpg') }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Produit Recyclé">
                <div class="card-body">
                    <h5 class="card-title">Produits Recyclés</h5>
                    <p class="card-text">Les produits recyclés sont fabriqués à partir de matériaux récupérés, réduisant la demande de nouvelles matières premières. Découvrez nos articles fabriqués à partir de papier, de carton, et d'autres matériaux recyclés.</p>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-3 mb-4">
            <div class="card card-fixed-height">
                <img src="{{ asset('images/durables.jpg') }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Produit Durable">
                <div class="card-body">
                    <h5 class="card-title">Produits Durables</h5>
                    <p class="card-text">Les produits durables sont conçus pour durer plus longtemps, réduisant ainsi le besoin de remplacement fréquent. Découvrez des articles fabriqués avec des matériaux de haute qualité qui résistent à l'épreuve du temps.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Catalogue des Produits -->
    <div class="my-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Catalogue des Produits</h2>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Voir tous les produits</a>
        </div>
        <div class="row">
            @if($products->isNotEmpty())
            @foreach($products->take(4) as $product)
            <div class="col-md-3 mb-4">
                <div class="card card-fixed-height">
                    <img src="{{ asset('storage/images/' . basename($product->image))}}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text description">{{ \Illuminate\Support\Str::limit($product->description, 200, '...') }}</p>
                        <p class="card-text"><strong>{{ $product->price }} €</strong></p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <!-- Card 1 -->
            <div class="col-md-3 mb-4">
                <div class="card card-fixed-height">
                    <img src="{{ asset('images/product1.jpg') }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Produit 1">
                    <div class="card-body">
                        <h5 class="card-title">Produit 1</h5>
                        <p class="card-text">Description du produit 1. Découvrez ses caractéristiques et ses avantages pour un choix éclairé.</p>
                        <a href="{{ route('products.show', 1) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3 mb-4">
                <div class="card card-fixed-height">
                    <img src="{{ asset('images/product2.jpg') }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Produit 2">
                    <div class="card-body">
                        <h5 class="card-title">Produit 2</h5>
                        <p class="card-text">Description du produit 2. Apprenez-en plus sur ses spécificités et comment il peut répondre à vos besoins.</p>
                        <a href="{{ route('products.show', 2) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-3 mb-4">
                <div class="card card-fixed-height">
                    <img src="{{ asset('images/product3.jpg') }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Produit 3">
                    <div class="card-body">
                        <h5 class="card-title">Produit 3</h5>
                        <p class="card-text">Description du produit 3. Explorez ses avantages et comment il peut améliorer votre quotidien.</p>
                        <a href="{{ route('products.show', 3) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-3 mb-4">
                <div class="card card-fixed-height">
                    <img src="{{ asset('images/product4.jpg') }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Produit 4">
                    <div class="card-body">
                        <h5 class="card-title">Produit 4</h5>
                        <p class="card-text">Description du produit 4. Découvrez comment ce produit peut vous offrir une solution efficace et durable.</p>
                        <a href="{{ route('products.show', 4) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

</div>
@endsection
