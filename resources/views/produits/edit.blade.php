@extends('layouts.master')

@section('css')
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Modifier Produit</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Modifier un produit</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('produits.update', $produit->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nom">Nom du produit</label>
                        <input type="text" name="nom" class="form-control" value="{{ $produit->nom }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $produit->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="number" name="prix" class="form-control" value="{{ $produit->prix }}" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="quantite_en_stock">Quantité en stock</label>
                        <input type="number" name="quantite_en_stock" class="form-control" value="{{ $produit->quantite_en_stock }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
