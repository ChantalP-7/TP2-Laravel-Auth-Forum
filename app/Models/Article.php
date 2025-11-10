<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',  // pour les titres multilingues
        'content',  // pour le contenu multilingue
        'category_id',  // l'ID de la catégorie
        'etudiant_id',  // l'ID de l'étudiant utilisateur
    ];

    protected $casts = [
        'title' => 'array',  // Cast en tableau pour les titres multilingues
        'content' => 'array',  // Cast en tableau pour les contenus multilingues
    ];

    // Relation avec la catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation avec l'utilisateur (étudiant)
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}