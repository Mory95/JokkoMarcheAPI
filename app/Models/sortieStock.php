<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sortieStock extends Model
{
    use HasFactory;
    
    public function bonInterne()
    {
        return $this->hasMany(bonInterne::class);
    }
}
