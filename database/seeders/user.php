<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsUser::insert([
            'name' => 'Dott. Leo',
            'email'=> 'ciao@email.it',
            'password'=> 'XXXXXXXXXXXXXXXX',
            'specializzazione' => 'Cardiologia',

         
        ]);

    }
}
