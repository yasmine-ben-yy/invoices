@extends('layouts.master')

@section('css')
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Clients</span>
        </div>
    </div>
 
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-12">
        <div class="container">
            <h1>Liste des Clients</h1>

            <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Ajouter un client</a>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>prenom</th>


                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->nom }}</td>
                            <td>{{ $client->prenom }}</td>

                            <td>{{ $client->email }}</td>
                            <td>{{ $client->telephone }}</td>
                            <td>{{ $client->adresse }}</td>
                            <td>
                            <td>
    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">
        <i class="fas fa-edit"></i> <!-- Icône pour Modifier -->
    </a>
    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
            <i class="fas fa-trash-alt"></i> <!-- Icône pour Supprimer -->
        </button>
    </form>
    <a href="{{ route('clients.factures', $client->id) }}" class="btn btn-info">
    <i class="fas fa-file-invoice"></i> Voir Factures
</a>

</td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection

@section('js')
@endsection

