@extends('layouts.master')

@section('css')
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ produit</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="row">
    @foreach($produits as $produit)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $produit->nom }}</h5>
                    <p class="card-text">{{ $produit->description }}</p>
                    <p class="card-text">Prix: {{ $produit->prix }} TND</p>
                    <p class="card-text">Quantité: {{ $produit->quantite_en_stock }}</p>
                    <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-warning">
    <i class="fas fa-edit"></i> <!-- Icône pour Modifier -->
</a>
<form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
        <i class="fas fa-trash-alt"></i> <!-- Icône pour Supprimer -->
    </button>
</form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('js')
@endsection
