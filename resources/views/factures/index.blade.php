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
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Liste des Factures</h1>
        <a href="{{ route('factures.create') }}" class="btn btn-primary">Créer une nouvelle facture</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Numéro</th>
                <th>Date</th>
                <th>Client</th>
                <th>Total HT</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($factures as $facture)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $facture->id }}</td>
                    <td>{{ $facture->date_facture }}</td>
                    <td>{{ $facture->client->nom }} {{ $facture->client->prenom }}</td>
                    <td>{{ number_format($facture->total_ht, 2, ',', ' ') }} TND</td>
                    <td>
                        <a href="{{ route('factures.show', $facture->id) }}" class="btn btn-info btn-sm">Voir</a>
                       
                        <a href="{{ route('factures.downloadPDF', $facture->id) }}" class="btn btn-secondary btn-sm">Télécharger PDF</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Aucune facture trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

<!-- row closed -->


@section('js')
@endsection
