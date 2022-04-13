<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'description',
        'sold',
        'quantity',
        'image',
        'new_prod',
        'price',
        'categorie_id'
    ];

    
    public function categorie()
    {
        return $this->belongsTo(categorie_product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
