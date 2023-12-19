<?php

namespace Database\Seeders;

use App\Models\Esame as ModelsEsame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class esame extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsEsame::insert([
            'name' => 'Esame Cardiologico',
            'descrizione' => 'Cardiologia',
            'id_dottore' => '1',
            'id_paziente' => '2',
            
        ]);

        ModelsEsame::insert([
            'name' => 'Esame Radiografico',
            'descrizione' => 'Medicina',
            'id_dottore' => '1',
            'id_paziente' => '1',
        ]);
    }
}
