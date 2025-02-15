@extends('layouts.master')

@section('css')
<!-- Add any specific CSS you may need for the form here -->
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Ajouter Produit</span>
            </div>
        </div>
       
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ajouter un Produits</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('produits.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom du produit</label>
                            <input type="text" class="form-control" id="nom" name="nom"  required>
                        </div>
                        <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" name="prix" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantite_en_stock">Quantité en stock</label>
                <input type="number" name="quantite_en_stock" class="form-control" required>
            </div>


            <button type="submit" class="btn btn-success">Ajouter le Produit</button>
            </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
<!-- Add any specific JS you may need for the form here -->
@endsection

