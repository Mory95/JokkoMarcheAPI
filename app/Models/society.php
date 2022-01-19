<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class society extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'localisation',
        'logo',
        'categorie_id',
    ];
    
    public function societies()
    {
        return $this->belongsTo(categorie_society::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
