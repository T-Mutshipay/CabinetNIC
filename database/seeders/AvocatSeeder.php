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
                'nom_complet' => 'Christian Ngandu Ilunga',
                'email' => 'christian.ngandu@example.com',
                'description' => "admis en qualité d’avocat au Barreau près la Cour d’appel de Kinshasa/Gombe depuis le 26 juin 2007. Il porte une expérience éprouvée dans le conseil des clients et le contentieux sur des questions relatives au droit civil (le droit de la famille, les successions, les obligations, les biens, la propriété intellectuelle et industrielle), le droit du travail et la sécurité sociale, le recouvrement des créances, le contentieux fiscal et parafiscal, y compris le droit ohada.",
                'image' => 'img/maitre_christian_ngandu.JPG',
                'role' => 'Avocat Fondateur',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
