<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esame extends Model
{   
    protected $table = 'esame';
    protected $fillable = ['name', 'descrizione', 'id_dottore', 'id_paziente'];

    use HasFactory;

    public function dottore()
    {
        return $this->belongsTo(Dottore::class, 'id_dottore');
    }

    public function paziente()
    {
        return $this->belongsTo(Paziente::class, 'id_paziente');
    }
}