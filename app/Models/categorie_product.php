<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie_product extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];
    
    public function products()
    {
        return $this->hasMany(product::class);
    }
}
