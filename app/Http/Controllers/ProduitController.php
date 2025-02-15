<?php


namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Afficher la liste des produits d'un utilisateur
    public function index()
    {
        // Récupérer les produits associés à l'utilisateur connecté
        $produits = Produit::where('user_id', auth()->id())->get();  // Correct method usage
        return view('produits.index', compact('produits'));
    }

    // Afficher le formulaire de création d'un produit
    public function create()
    {
        return view('produits.create');
    }

    // Sauvegarder un produit
   // Dans ProduitController.php
public function store(Request $request)
{
    // Valider les données reçues
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'prix' => 'required|numeric',
        'quantite_en_stock' => 'required|integer',
    ]);

    // Créer un produit en ajoutant l'user_id
    $produit = Produit::create([
        'user_id' => auth()->id(), // Assurez-vous que l'utilisateur est authentifié
        'nom' => $validatedData['nom'],
        'description' => $validatedData['description'],
        'prix' => $validatedData['prix'],
        'quantite_en_stock' => $validatedData['quantite_en_stock'],
    ]);

    // Rediriger ou retourner une réponse
    return redirect()->route('produits.index');
}


    // Afficher le formulaire pour éditer un produit
    public function edit($id)
    {
        // Trouver le produit par ID, uniquement s'il appartient à l'utilisateur connecté
        $produit = Produit::where('user_id', auth()->id())->findOrFail($id);
        return view('produits.edit', compact('produit'));
    }

    // Mettre à jour un produit
    public function update(Request $request, $id)
    {
        // Valider les données de la requête
        $request->validate([
            'nom' => 'required|string',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'quantite_en_stock' => 'required|integer',
        ]);

        // Trouver le produit par ID, uniquement s'il appartient à l'utilisateur connecté
        $produit = Produit::where('user_id', auth()->id())->findOrFail($id);

        // Mettre à jour les informations du produit
        $produit->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'quantite_en_stock' => $request->quantite_en_stock,
        ]);

        // Rediriger vers la liste des produits avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès');
    }

    // Supprimer un produit
    public function destroy($id)
    {
        // Trouver le produit par ID, uniquement s'il appartient à l'utilisateur connecté
        $produit = Produit::where('user_id', auth()->id())->findOrFail($id);

        // Supprimer le produit
        $produit->delete();

        // Rediriger vers la liste des produits avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');
    }

    // Afficher les détails d'un produit
    public function show($id)
    {
        // Trouver le produit par ID, uniquement s'il appartient à l'utilisateur connecté
        $produit = Produit::where('user_id', auth()->id())->findOrFail($id);
        return view('produits.show', compact('produit'));
    }
}

