<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paziente extends Model
{   
    protected $table = 'pazienti';
    protected $fillable = [];
    use HasFactory;

    public function esami()
    {
        return $this->hasMany(Esame::class, 'id_paziente');
    }
    
}
