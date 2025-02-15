@extends('layouts.master')

@section('css')
<!-- Add any specific CSS you may need for the form here -->
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Ajouter un client</span>
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
                    <h4 class="card-title">Ajouter un client</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('clients.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom du client</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom du client" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Prénom du client</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer le nom du client" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Entrer l'email du client" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Numéro de téléphone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Entrer le numéro de téléphone" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Adresse</label>
                            <textarea class="form-control" id="adresse" name="adresse" rows="3" placeholder="Entrer l'adresse du client" required></textarea>
                        </div>


                        <button type="submit" class="btn btn-success">Ajouter le client</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
@endsection

