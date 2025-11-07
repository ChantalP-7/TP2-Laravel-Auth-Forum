<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['category'];

    // Déclare que 'category' est un champ traduit
    public $translatable = ['category'];

    public function articles()    {
        return $this->hasMany(Article::class);
    }
}