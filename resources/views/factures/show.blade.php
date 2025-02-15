@extends('layouts.master')
@section('css')
@endsection
@section('page-header')

<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Factures</span>
        </div>
    </div>
 
</div>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3>Facture #{{ $facture->id }}</h3>
                    </div>

                    <div class="card-body">
                        <!-- Informations de la facture -->
                        <div class="mb-4">
                            <h5>Client :</h5>
                            <p><strong>Nom :</strong> {{ $facture->client->nom }}</p>
                            <p><strong>Email :</strong> {{ $facture->client->email }}</p>
                            <p><strong>Téléphone :</strong> {{ $facture->client->telephone }}</p>
                            <p><strong>Adresse :</strong> {{ $facture->client->adresse }}</p>
                        </div>

                        <!-- Tableau des produits -->
                        <div class="mb-4">
                            <h5>Produits :</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Quantité</th>
                                        <th>Prix Unitaire</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($facture->produits as $produit)
                                        <tr>
                                            <td>{{ $produit->nom }}</td>
                                            <td>{{ $produit->pivot->quantite }}</td>
                                            <td>{{ number_format($produit->pivot->prix_unitaire, 2, ',', ' ') }} TDN</td>
                                            <td>{{ number_format($produit->pivot->quantite * $produit->pivot->prix_unitaire, 2, ',', ' ') }} TDN</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Options -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('factures.index') }}" class="btn btn-secondary">Retour à la liste des factures</a>
                            <a href="{{ route('factures.downloadPDF', $facture->id) }}" class="btn btn-secondary btn-sm">Télécharger PDF</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
@endsection