<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Afficher la liste des clients d'un utilisateur
   // In your ClientController
public function index()
{
    // Récupérer les clients associés à l'utilisateur connecté
    $clients = Client::where('user_id', auth()->id())->get();  // Correct method usage
    return view('clients.index', compact('clients'));
}


    // Afficher le formulaire de création d'un client
    public function create()
    {
        return view('clients.create');
    }

    // Sauvegarder un client
    public function store(Request $request)
    {
        // Validation des données (ajoutez les règles si nécessaire)
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:clients,email',
            'telephone' => 'required',
            'adresse' => 'required',
        ]);
    
        // Créer un client pour l'utilisateur connecté
        Client::create([
            'user_id' => auth()->id(),  // Associer le client à l'utilisateur connecté
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
        ]);
    
        // Rediriger vers la liste des clients
        return redirect()->route('clients.index')->with('success', 'Client créé avec succès');
    }
    

    // Afficher le formulaire pour éditer un client
    public function edit($id)
    {
        // Trouver le client par ID, uniquement s'il appartient à l'utilisateur connecté
        $client = Client::where('user_id', auth()->id())->findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    // Mettre à jour un client
    public function update(Request $request, $id)
    {
        // Valider les données de la requête
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email|unique:clients,email,' . $id,
            'telephone' => 'required|string',
        ]);

        // Trouver le client par ID, uniquement s'il appartient à l'utilisateur connecté
        $client = Client::where('user_id', auth()->id())->findOrFail($id);

        // Mettre à jour les informations du client
        $client->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone' => $request->telephone,
        ]);

        // Rediriger vers la liste des clients avec un message de succès
        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès');
    }

    // Supprimer un client
    public function destroy($id)
    {
        // Trouver le client par ID, uniquement s'il appartient à l'utilisateur connecté
        $client = Client::where('user_id', auth()->id())->findOrFail($id);

        // Supprimer le client
        $client->delete();

        // Rediriger vers la liste des clients avec un message de succès
        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès');
    }

    // Afficher les détails d'un client
    public function show($id)
    {
        // Trouver le client par ID, uniquement s'il appartient à l'utilisateur connecté
        $client = Client::where('user_id', auth()->id())->findOrFail($id);
        return view('clients.show', compact('client'));
    }
    public function listerFactures($client_id)
    {
        $client = Client::findOrFail($client_id);
        $factures = $client->factures; // Récupère les factures du client
    
        return view('clients.factures', compact('client', 'factures'));
    }
    
    

}
