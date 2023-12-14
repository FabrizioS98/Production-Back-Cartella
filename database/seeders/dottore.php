<?php

namespace Database\Seeders;

use App\Models\Dottore as ModelsDottore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dottore extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsDottore::insert([
            'name' => 'Dott. Leo',
            'email'=> 'ciao@email.it',
            'password'=> 'XXXXXXXXXXXXXXXX',
            'specializzazione' => 'Cardiologia',

         
        ]);

        ModelsDottore::insert([
            'name' => 'Dott. Pippo',
            'email'=> 'bell@email.it',
            'password'=> 'VVVVVVVVV',
            'specializzazione' => 'Medicina Generale',
       
        ]);

    }
}
