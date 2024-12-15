<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;

class CustomController extends BaseController
{
    // Afficher la page d'index
    public function showIndex()
    {
        return view('auth.custom.index');
    }

    // Afficher la page d'inscription
    public function showRegister()
    {
        return view('auth.custom.register');
    }

    // Gérer l'inscription de l'utilisateur
    public function handleRegister(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Création de l'utilisateur
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Redirection après la création du compte
        return redirect()->route('auth.custom.index')->with('success', 'Compte créé avec succès !');
    }
}
