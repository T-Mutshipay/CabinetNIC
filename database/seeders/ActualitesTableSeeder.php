<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ActualitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actualites')->insert([
            [
                'titre' => 'Lancement d\'un nouveau produit',
                'description' => 'Découvrez notre nouveau produit innovant.',
                'contenu' => 'Nous sommes ravis de présenter notre tout dernier produit qui révolutionnera le marché.',
                'image' => 'img/fond.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Conférence annuelle 2024',
                'description' => 'Participez à notre conférence annuelle.',
                'contenu' => 'Rejoignez-nous pour notre conférence annuelle, où nous discuterons des dernières tendances et innovations.',
                'image' => 'img/fond.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Promotion spéciale',
                'description' => 'Profitez de nos offres exceptionnelles.',
                'contenu' => 'Nous offrons des réductions incroyables pour une durée limitée. Ne manquez pas cette occasion unique de profiter de nos offres exceptionnelles ! Que vous cherchiez des produits de qualité à des prix défiant toute concurrence ou que vous souhaitiez simplement faire de bonnes affaires, c\'est le moment idéal pour acheter. Nos réductions sont valables sur une large gamme de produits, alors n\'hésitez pas à explorer notre sélection et à trouver ce dont vous avez besoin. Ne laissez pas cette opportunité s\'échapper ! Visitez notre site dès maintenant et bénéficiez de nos prix réduits avant qu\'il ne soit trop tard !',
                'image' => 'img/fond.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
