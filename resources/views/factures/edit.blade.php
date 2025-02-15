@extends('layouts.master')

@section('css')
@endsection

@section('page-header')
<div class="container">
    <h1 class="h3 mb-4">Modifier la Facture #{{ $facture->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('factures.update', $facture->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <select name="client_id" id="client_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $facture->client_id ? 'selected' : '' }}>
                        {{ $client->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date_facture" class="form-label">Date</label>
            <input type="date" name="date_facture" id="date_facture" class="form-control" value="{{ $facture->date_facture }}" required>
        </div>

        <div class="mb-3">
            <label for="tva" class="form-label">TVA (%)</label>
            <input type="number" name="tva" id="tva" class="form-control" value="{{ $facture->tva }}" required>
        </div>

        <div class="mb-3">
            <label for="produits" class="form-label">Produits</label>
            <div id="produits">
                @foreach ($produits as $produit)
                    <div class="form-check">
                        <input 
                            type="checkbox" 
                            name="produits[{{ $produit->id }}][id]" 
                            value="{{ $produit->id }}" 
                            class="form-check-input"
                            {{ $facture->produits->contains($produit->id) ? 'checked' : '' }}
                        >
                        <label class="form-check-label">
                            {{ $produit->nom }} - {{ number_format($produit->prix, 2, ',', ' ') }} TND
                        </label>
                        <input 
                            type="number" 
                            name="produits[{{ $produit->id }}][quantite]" 
                            placeholder="Quantité" 
                            class="form-control mt-2" 
                            min="1" 
                            value="{{ $facture->produits->where('id', $produit->id)->first()->pivot->quantite ?? '' }}"
                            {{ $facture->produits->contains($produit->id) ? '' : 'disabled' }}
                        >
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<script>
    // Permet d'activer/désactiver les champs de quantité en fonction du checkbox
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const quantityInput = this.parentElement.querySelector('input[type="number"]');
            quantityInput.disabled = !this.checked;
        });
    });
</script>
endsection

@section('js')
@endsection
