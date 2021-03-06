<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bonInterne extends Model
{
    use HasFactory;

    protected $fillable = [
        'numBon',
        'validation',
        'listProd',
    ];

    public function sortieStocks()
    {
        return $this->hasMany(sortieStock::class);
    }
}
