@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h3 class="text-center mb-4">Créer une Facture</h3>

            <!-- Formulaire de création de facture -->
            <form method="POST" action="{{ route('factures.store') }}">
                @csrf  <!-- Protection CSRF -->

                <!-- Sélection du Client -->
                <div class="mb-3">
                    <label for="client_id" class="form-label">Client</label>
                    <select name="client_id" id="client_id" class="form-select" required>
                        <option value="">Sélectionner un client</option>
                        @foreach($clients as $client)
    <option value="{{ $client->id }}">{{ $client->email }}</option>
@endforeach

                    </select>
                </div>

                <!-- Date de la facture -->
                <div class="mb-3">
                    <label for="date_facture" class="form-label">Date de la Facture</label>
                    <input type="date" name="date_facture" id="date_facture" class="form-control" required>
                </div>

                <!-- Total HT -->
                <div class="mb-3">
                    <label for="total_ht" class="form-label">Total HT</label>
                    <input type="number" name="total_ht" id="total_ht" class="form-control" required step="0.01" readonly>
                </div>

                <!-- TVA -->
                <div class="mb-3">
                    <label for="tva" class="form-label">TVA (%)</label>
                    <input type="number" name="tva" id="tva" class="form-control" required step="0.01">
                </div>

                <!-- Total TTC -->
                <div class="mb-3">
                    <label for="total" class="form-label">Total TTC</label>
                    <input type="number" name="total" id="total" class="form-control" required step="0.01" readonly>
                </div>

                <!-- Produits -->
                <div class="mb-3" id="produits-section">
                    <label for="produits" class="form-label">Produits</label>
                    <div id="produit-list">
                        <div class="row mb-2 produit">
                            <div class="col-md-4">
                                <select name="produits[0][id]" class="form-select" required>
                                    <option value="">Sélectionner un produit</option>
                                    @foreach($produits as $produit)
                                        <option value="{{ $produit->id }}" data-prix="{{ $produit->prix }}">
                                            {{ $produit->nom }} - {{ $produit->prix }} Dinars
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="produits[0][quantite]" class="form-control" placeholder="Quantité" required min="1">
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="produits[0][prix_unitaire]" class="form-control" placeholder="Prix unitaire" required step="0.01" readonly>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-produits">Supprimer</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-produits" class="btn btn-success">Ajouter un produit</button>
                </div>

                <button type="submit" class="btn btn-primary">Créer la facture</button>
            </form>
        </div>
    </div>

    <!-- Script pour ajouter et supprimer des produits dynamiquement -->
    <script>
        $(document).ready(function() {
            let totalHT = 0;
            let tvaPercent = 0;


            function recalculerTotaux() {
                totalHT = 0;
                $('#produit-list .produit').each(function() {
                    let quantite = parseFloat($(this).find('input[name*="quantite"]').val()) || 0;
                    let prixUnitaire = parseFloat($(this).find('input[name*="prix_unitaire"]').val()) || 0;
                    totalHT += quantite * prixUnitaire;
                });

                // Mise à jour du Total HT
                $('#total_ht').val(totalHT.toFixed(2));

                // Calcul TVA et Total TTC
                tvaPercent = parseFloat($('#tva').val()) || 0;
                let tva = (totalHT * tvaPercent) / 100;
                let totalTTC = totalHT + tva;

                // Mise à jour du Total TTC
                $('#total').val(totalTTC.toFixed(2));
            }

            // Ajouter un nouveau produit
            $('#add-produits').on('click', function() {
                let produitIndex = $('#produit-list .produit').length;
                let newProduit = `
                    <div class="row mb-2 produit">
                        <div class="col-md-4">
                            <select name="produits[${produitIndex}][id]" class="form-select" required>
                                <option value="">Sélectionner un produit</option>
                                @foreach($produits as $produit)
                                    <option value="{{ $produit->id }}" data-prix="{{ $produit->prix }}">
                                        {{ $produit->nom }} - {{ $produit->prix }} Dinars
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="produits[${produitIndex}][quantite]" class="form-control" placeholder="Quantité" required min="1">
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="produits[${produitIndex}][prix_unitaire]" class="form-control" placeholder="Prix unitaire" required step="0.01" readonly>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove-produits">Supprimer</button>
                        </div>
                    </div>
                `;
                $('#produit-list').append(newProduit);
                recalculerTotaux();
            });

            // Supprimer un produit
            $(document).on('click', '.remove-produits', function() {
                $(this).closest('.produit').remove();
                recalculerTotaux();
            });

            // Mettre à jour le prix unitaire en fonction du produit sélectionné
            $(document).on('change', 'select[name*="produits"]', function() {
                let prixUnitaire = $(this).find(':selected').data('prix');
                $(this).closest('.produit').find('input[name*="prix_unitaire"]').val(prixUnitaire);
                recalculerTotaux();
            });

            // Mettre à jour le total lorsque la quantité change
            $(document).on('input', 'input[name*="quantite"]', function() {
                recalculerTotaux();
            });

            // Mettre à jour le total lorsque la TVA change
            $('#tva').on('input', function() {
                recalculerTotaux();
            });
        });
    </script>
@endsection
@section('js')
@endsection