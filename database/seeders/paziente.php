<?php

namespace Database\Seeders;

use App\Models\Paziente as ModelsPaziente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class paziente extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsPaziente::insert([
            'name' => 'Luca',
            'cognome' => 'Rossi',
            'codice_fiscale' => 'XXXXXXXXXXXXXXXX',
            'data_nascita' => '1999-01-21',
            
        ]);

        ModelsPaziente::insert([
            'name' => 'Paolo',
            'cognome' => 'Verdi',
            'codice_fiscale' => 'VVVVVVVVVVVVVVVV',
            'data_nascita' => '1999-01-21',
        ]);
    }
}
