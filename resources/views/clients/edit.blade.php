@extends('layouts.master')

@section('css')
<!-- Ajoute ici tout CSS spécifique si nécessaire -->
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Modifier un client</span>
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
                    <h4 class="card-title">Modifier un client</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('clients.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nom">Nom :</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $client->nom }}" required>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Prénom :</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $client->prenom }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="telephone">Téléphone :</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $client->telephone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="adresse">Adresse :</label>
                            <textarea class="form-control" id="adresse" name="adresse" rows="3" required>{{ $client->adresse }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour à la liste</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
@endsection
