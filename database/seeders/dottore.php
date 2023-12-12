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
            'specializzazione' => 'Cardiologia',
         
        ]);

        ModelsDottore::insert([
            'name' => 'Dott. Pippo',
            'specializzazione' => 'Medicina Generale',
       
        ]);

    }
}
