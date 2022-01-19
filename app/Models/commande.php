<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_commande',
        'montant',
        'delais_livraison',
        'etat_commande',
        'lieu_livraison',
        'mode_livraison',
        'prix_total',
        'mode_paiement',
    ];

    
    public function client()
    {
        return $this->belongsTo(client::class);
    }
}
