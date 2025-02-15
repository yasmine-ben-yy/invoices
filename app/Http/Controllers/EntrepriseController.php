<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('entreprise.index', compact('entreprises'));
    }
    
    public function create()
    {
        return view('entreprises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'code_postal' => 'required|string|max:10',
            'ville' => 'required|string|max:100',
            'pays' => 'required|string|max:100',
            'numero_telephone' => 'required|string|max:15',
            'email' => 'required|email|unique:entreprises,email',
            'site_web' => 'nullable|url',
        ]);

        $entreprise = Entreprise::create([
            'user_id' => auth()->user()->id, // Utilisation de l'utilisateur connecté
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'code_postal' => $request->code_postal,
            'ville' => $request->ville,
            'pays' => $request->pays,
            'numero_telephone' => $request->numero_telephone,
            'email' => $request->email,
            'site_web' => $request->site_web,
        ]);

        return redirect()->route('home')->with('success', 'Entreprise créée avec succès.');
    }

    public function show(Entreprise $entreprise)
    {
        return view('entreprises.show', compact('entreprise'));
    }

    public function edit(Entreprise $entreprise)
    {
        return view('entreprises.edit', compact('entreprise'));
    }

    public function update(Request $request, Entreprise $entreprise)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'code_postal' => 'required|string|max:10',
            'ville' => 'required|string|max:100',
            'pays' => 'required|string|max:100',
            'numero_telephone' => 'required|string|max:15',
            'email' => 'required|email|unique:entreprises,email,' . $entreprise->id,
            'site_web' => 'nullable|url',
        ]);

        $entreprise->update($request->all());

        return redirect()->route('entreprises.index')->with('success', 'Entreprise mise à jour avec succès.');
    }

    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();
        return redirect()->route('entreprises.index')->with('success', 'Entreprise supprimée avec succès.');
    }
}
