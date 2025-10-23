<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    //public $timestamps = false;

    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'dateNaissance',
        'courriel',
        'ville_id'
    ];


    // Relation avec la table users
    public function user()
    {
        return $this->hasOne(User::class, 'etudiant_id');
    }

    // Relation avec la table villes
    public function ville() {
        return $this->belongsTo(Ville::class);
    }


    public static function createWithUser(array $data)
    {
        // Crée d'abord l'étudiant
        $etudiant = self::create($data);

        // Crée l'utilisateur lié
        $etudiant->user()->create([
            'name' => $etudiant->nom,   // Nom de l'étudiant pour le user
            'email' => $etudiant->courriel,     // Utilisation du courriel de l'étudiant
            'password' => bcrypt('password'),    // Mot de passe par défaut
        ]);

        return $etudiant;
    }

}
