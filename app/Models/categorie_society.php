<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie_society extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];
    
    public function societies()
    {
        return $this->hasMany(society::class);
    }
}
