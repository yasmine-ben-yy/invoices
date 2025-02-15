<?php


namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureController extends Controller

{
  


    public function downloadPDF($id)
{
    // Récupérer la facture avec son client
    $facture = Facture::with('client')->findOrFail($id);
    
    // Calcul du total HT, TVA et total TTC
    $totalHT = $facture->total_ht;
    $tva = ($totalHT * $facture->tva) / 100;
    $totalTTC = $totalHT + $tva;

    // Récupérer l'entreprise de l'utilisateur connecté
    $entreprise = auth()->user()->entreprise; // récupère l'entreprise associée à l'utilisateur connecté

    // Passer les données à la vue PDF
    $pdf = PDF::loadView('factures.pdf', [
        'facture' => $facture,
        'totalHT' => $totalHT,
        'tva' => $tva,
        'totalTTC' => $totalTTC,
        'entreprise' => $entreprise,
    ]);
    
    // Télécharger le PDF
    return $pdf->download('facture_' . $facture->id . '.pdf');
}

    public function index()
    {
        // Récupérer les factures de l'utilisateur connecté
        $factures = Facture::where('user_id', auth()->user()->id)->get();

        return view('factures.index', compact('factures'));
    }

    // Afficher le formulaire pour créer une nouvelle facture
    public function create()
    {
        // Récupérer les clients associés à l'utilisateur connecté
        $clients = Client::where('user_id', auth()->id())->get();
    
        $produits = Produit::where('user_id', auth()->id())->get();
    
        // Passer les données à la vue
        return view('factures.create', compact('clients', 'produits'));
    }
    

    // Enregistrer une nouvelle facture
    public function store(Request $request)
{
   


    $request->validate([
        'client_id' => 'required|exists:clients,id',
        'date_facture' => 'required|date',
        'total_ht' => 'required|numeric',
        'tva' => 'required|numeric',
        'total' => 'required|numeric',
        'produits' => 'required|array',
        'produits.*.id' => 'required|exists:produits,id',
        'produits.*.quantite' => 'required|numeric|min:1',
        'produits.*.prix_unitaire' => 'required|numeric|min:0.01',
    ]);
    

    $totalHT = 0;
    foreach ($request->produits as $produit) {
        $totalHT += $produit['quantite'] * $produit['prix_unitaire'];
    }

    // Calcul de la TVA
    $tva = ($totalHT * $request->tva) / 100;

    // Calcul du total TTC
    $totalTTC = $totalHT + $tva;

    // Création de la facture
    $facture = Facture::create([
        'user_id' => auth()->user()->id, // Utilisation de l'utilisateur connecté
        'client_id' => $request->client_id,
        'date_facture' => $request->date_facture,
        'total_ht' => $totalHT,
        'tva' =>  $request->
        
        
        tva,
        'total' => $totalTTC,
    ]);

    // Attacher les produits à la facture
    foreach ($request->produits as $produit) {
        $facture->produits()->attach($produit['id'], [
            'quantite' => $produit['quantite'],
            'prix_unitaire' => $produit['prix_unitaire'],
            'total' => $produit['quantite'] * $produit['prix_unitaire'],
        ]);
    }

    // Retourner à la liste des factures avec un message de succès
    return redirect()->route('factures.index')->with('success', 'Facture créée avec succès');
}



    // Afficher les détails d'une facture
    public function show($id)
    {
        // Récupérer la facture par ID et vérifier que l'utilisateur est autorisé à la voir
        $facture = Facture::where('user_id', auth()->user()->id)->findOrFail($id);

        return view('factures.show', compact('facture'));
    }

   
    public function destroy($id)
    {
        // Récupérer la facture à supprimer
        $facture = Facture::where('user_id', auth()->user()->id)->findOrFail($id);

        // Supprimer la facture
        $facture->delete();

        return redirect()->route('factures.index')->with('success', 'Facture supprimée avec succès');
    }
}
