<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PharIo\Manifest\Email;

class CollaborateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collaborateurs')->insert([
            [
                'nom_complet' => 'Jean Dupont',
                'post' => 'coursier',
                'email' => 'jean@gmail.com',
                'description' => 'Jean Dupont est spécialisé dans le droit civil avec plus de 10 ans d\'expérience.',
                'image' => 'avocat1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_complet' => 'Marie Curie',
                'post' => 'consultant ',
                'email' =>'marie@gmail.com',
                'description' => 'Marie Curie est une experte reconnue en droit pénal, défendant des cas complexes.',
                'image' => 'avocat1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_complet' => 'Albert Einstein',
                'post' => 'Secretaire',
                'email' => 'albert@gmail.com',
                'description' => 'Albert Einstein a une grande expérience en droit des affaires et en gestion de litiges commerciaux.',
                'image' => 'avocat.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
