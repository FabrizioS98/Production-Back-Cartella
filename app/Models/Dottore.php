<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\Dottore as Authenticatable;
class Dottore extends Model
{   
    use HasFactory, Notifiable;
    protected $table = 'dottori';
   
   
    

    public function esami()
    {
        return $this->hasMany(Esame::class, 'id_dottore');
    }

   
}
