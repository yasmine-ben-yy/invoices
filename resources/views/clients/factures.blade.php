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
        <h2>Factures de {{ $client->nom }}</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($factures as $facture)
            <tr>
                <td>{{ $facture->id }}</td>
                <td>{{ $facture->date_facture }}</td>
                <td>{{ $facture->total }} TDN</td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('clients.index') }}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Retour
</a>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection

@section('js')
@endsection