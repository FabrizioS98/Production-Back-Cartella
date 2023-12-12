<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dottore extends Model
{
    protected $table = 'dottori';
    use HasFactory;

    public function esami()
    {
        return $this->hasMany(Esame::class, 'id_dottore');
    }
}
