<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Afficher tous les utilisateurs
    public function index()
    {
        // Récupérer tous les utilisateurs
        //$users = User::all();
        $users = User::paginate(12);

        return view('user.index', compact('users'));
    }

    // Afficher un utilisateur spécifique
    public function show($id)
    {
        // Récupérer l'utilisateur par son ID
        $user = User::findOrFail($id);
        
        // Récupérer l'étudiant associé à cet utilisateur
        $etudiant = $user->etudiant;

        return view('user.show', compact('user', 'etudiant'));
    }
}
