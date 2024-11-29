<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvocatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avocats')->insert([
            [
                'nom_complet' => 'Jean Dupont2',
                'email' => 'jeandupont2@example.com',
                'description' => 'Spécialiste en droit commercial avec plus de 10 ans d\'expérience.',
                'image' => 'img/avocat1.jpg',
                'role' => 'Avocat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_complet' => 'Marie Curie',
                'email' => 'marie.curie@example.com',
                'description' => 'Avocate expérimentée en droit de la famille et en droit immobilier.',
                'image' => 'img/avocats/marie_curie.jpg',
                'role' => 'Avocat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_complet' => 'Ali Ben Salah',
                'email' => 'ali.bensalah@example.com',
                'description' => 'Expert en droit pénal. Défend les droits de ses clients avec passion.',
                'image' => 'img/avocat2.jpg',
                'role' => 'Avocat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_complet' => 'Sophia Smith',
                'email' => 'sophia.smith@example.com',
                'description' => 'Conseillère juridique spécialisée en conformité réglementaire.',
                'image' => 'img/agent.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_complet' => 'Carlos Fernandez',
                'email' => 'carlos.fernandez@example.com',
                'description' => 'Avocat en droit international avec une expertise dans les litiges transfrontaliers.',
                'image' => 'img/avocat1.jpg',
                'role' => 'Avocat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}