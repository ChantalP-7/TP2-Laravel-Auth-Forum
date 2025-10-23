<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    //public $timestamps = false;
    protected $fillable = ['ville'];
    
    public function etudiant(){
        return $this->hasMany(Etudiant::class);
    }
}
