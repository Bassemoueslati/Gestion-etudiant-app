<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassestableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('Classes')->insert([
            ['libelle'=>'6ème'],
            ['libelle'=>'5ème'],
            ['libelle'=>'4ème'],
            ['libelle'=>'3ème'],
            ['libelle'=>'2ème'],
            ['libelle'=>'1ème'],
        ]);
    }
}
