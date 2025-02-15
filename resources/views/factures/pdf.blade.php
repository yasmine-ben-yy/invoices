<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture #{{ $facture->id }}</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            color: #4a4a4a; /* Gris foncé pour le texte */
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Fond clair */
        }

        /* Header Styles */
        .header {
            background-color: #6c5ce7; /* Violet pastel */
            color: white;
            text-align: center;
            padding: 40px 0;
            border-bottom: 5px solid #a29bfe; /* Violet plus clair */
        }

        .header h1 {
            margin: 0;
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        .header p {
            margin: 5px 0;
            font-size: 16px;
            opacity: 0.9;
        }

        /* Enterprise Information */
        .enterprise-info {
            margin: 30px auto;
            padding: 25px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            max-width: 800px;
            border-left: 5px solid #a29bfe; /* Violet clair */
        }

        .enterprise-info div {
            margin-bottom: 10px;
            font-size: 14px;
            line-height: 1.6;
        }

        .enterprise-info strong {
            font-weight: bold;
            color: #6c5ce7; /* Violet pastel */
        }

        /* Facture Information */
        .facture-info {
            margin: 30px auto;
            padding: 25px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            max-width: 800px;
            border-left: 5px solid #00b894; /* Vert pastel */
        }

        .facture-info div {
            margin-bottom: 10px;
            font-size: 14px;
            line-height: 1.6;
        }

        .facture-info .total {
            font-size: 18px;
            font-weight: bold;
            color: #00b894; /* Vert pastel */
        }

        /* Products Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px auto;
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #6c5ce7; /* Violet pastel */
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table tr:hover {
            background-color: #f5f5f5;
        }

        table td {
            font-size: 14px;
        }

        /* Footer */
        .footer {
            background-color: #6c5ce7; /* Violet pastel */
            color: white;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 14px;
            border-top: 3px solid #a29bfe; /* Violet clair */
        }

        .footer p {
            margin: 5px 0;
            opacity: 0.9;
        }

        .footer a {
            color: #a29bfe; /* Violet clair */
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Additional Styling */
        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-primary {
            color: #6c5ce7; /* Violet pastel */
        }

        .text-success {
            color: #00b894; /* Vert pastel */
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mt-20 {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header">
        <h1>Facture #{{ $facture->id }}</h1>
        <p>{{ $entreprise->nom }} - {{ $entreprise->adresse }}</p>
        <p>{{ $entreprise->email }} | {{ $entreprise->numero_telephone }}</p>
    </div>

    <!-- Enterprise Information -->
    <div class="enterprise-info">
        <div><strong>Nom de l'entreprise :</strong> {{ $entreprise->nom }}</div>
        <div><strong>Adresse :</strong> {{ $entreprise->adresse }}</div>
        <div><strong>Email :</strong> {{ $entreprise->email }}</div>
        <div><strong>Téléphone :</strong> {{ $entreprise->numero_telephone }}</div>
    </div>

    <!-- Facture Information -->
    <div class="facture-info">
        <div><strong>Client :</strong> {{ $facture->client->nom  }} {{ $facture->client->prenom  }}</div>
        <div><strong>Date :</strong> {{ $facture->date_facture }}</div>
        <div><strong>TVA :</strong> {{ $facture->tva }}%</div>
        <div class="total">Total TTC : {{ number_format($facture->total, 2, ',', ' ') }} €</div>
    </div>

    <!-- Products Table -->
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facture->produits as $produit)
                <tr>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->pivot->quantite }}</td>
                    <td>{{ number_format($produit->pivot->prix_unitaire, 2, ',', ' ') }} TDN</td>
                    <td>{{ number_format($produit->pivot->quantite * $produit->pivot->prix_unitaire, 2, ',', ' ') }} TDN</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer Section -->
    <div class="footer">
        <p>Merci pour votre confiance !</p>
        <p><a href="https://www.{{ $entreprise->nom }}.com">www.{{ $entreprise->nom }}.com</a></p>
    </div>

</body>
</html>

