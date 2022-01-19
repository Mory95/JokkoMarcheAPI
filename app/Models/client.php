<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'sexe',
        'adress',
        'phone_number',
        'email'
    ];
    
    public function commandes()
    {
        return $this->hasMany(commande::class);
    }

}
