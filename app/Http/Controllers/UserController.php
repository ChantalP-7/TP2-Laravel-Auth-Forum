<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    /**
     * Affiche l'espace de l'étudiant avec son profil et ses articles.
     */
    public function indexUser()
    {
        $user = auth()->user();  // Récupère l'utilisateur connecté

        // Vérifier si l'utilisateur a un profil étudiant
        if ($user->etudiant) {
            // Récupérer les articles de l'étudiant connecté
            $articles = Article::where('etudiant_id', $user->etudiant->id)->get();

            // Retourner la vue avec les articles
            return view('user.dashboard', compact('user', 'articles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    /*public function create()
    {
        return view('user.create');
    }*/


    /**
     * Store a newly created resource in storage.
     */
    /*public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'username' => 'required|email|unique:users',
        'password' => 'required|min:6|max:20'
        ]);
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

          return redirect(route('user.index'))->withSuccess('User created successfully!');
    }*/

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
