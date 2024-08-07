@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Devis pour {{ $service->name }}</h1>

        @if($quotes->isEmpty())
            <p>Aucun devis trouvé pour ce service.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Utilisateur</th>
                        <th>Email</th> 
                        <th>Date de création</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotes as $quote)
                        <tr>
                            <td>{{ $quote->id }}</td>
                            <td>{{ $quote->description ?? 'Aucune description' }}</td>
                            <td>{{ $quote->user->name }}</td>
                            <td>{{ $quote->user->email }}</td>
                            <td>{{ $quote->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
