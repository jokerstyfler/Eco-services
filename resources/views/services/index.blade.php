@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Liste de services</h1>
        @auth
        @can('create service')
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addServiceModal">
            Ajouter un Service
        </button>
        @endcan
        @endauth
    </div>

    <div class="row">
        @forelse($services as $service)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ $service->image ? asset('storage/images/' . basename($service->image)) : asset('images/default.jpg') }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="{{ $service->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->name }}</h5>
                    <p class="card-text description">{{ $service->description }}</p>
                    <p class="card-text">Prix: {{ $service->price ? $service->price . ' €' : 'Non précisé' }}</p>

                    @can('create devis', App\Models\Quote::class)
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createQuoteModal">
                        Créer un devis
                    </button>

                    <!-- Modal Create quote-->
                    <div class="modal fade" id="createQuoteModal" tabindex="-1" aria-labelledby="createQuoteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createQuoteModalLabel">Créer un devis</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="createQuoteForm" method="POST" action="{{ route('quotes.store') }}">
                                        @csrf
                                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description (facultatif)</label>
                                            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Soumettre</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan

                    @auth
                    @can('update service')
                    <a href="{{ route('services.edit', $service) }}" class="btn btn-warning">Modifier</a>
                    @endcan

                    @can('read devis')
                    <a href="{{ route('quotes.index', ['service' => $service->id]) }}" class="btn btn-primary">
                        Consulter les devis
                    </a>
                    @endcan
                    @endauth
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <p>Aucun service disponible.</p>
        </div>
        @endforelse
    </div>

    <!-- Modal D'ajout Service-->
    <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addServiceModalLabel">Ajouter un Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire pour ajouter un service -->
                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom du Service</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Prix</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

