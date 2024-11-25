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
        // Exemple de données fictives
        DB::table('actualites')->insert([
            [
                'titre' => 'Lancement d\'un nouveau produit',
                'description' => 'Découvrez notre nouveau produit innovant.',
                'contenu' => 'Nous sommes ravis de présenter notre tout dernier produit qui révolutionnera le marché.',
                'image' => 'images/produit_nouveau.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Conférence annuelle 2024',
                'description' => 'Participez à notre conférence annuelle.',
                'contenu' => 'Rejoignez-nous pour notre conférence annuelle, où nous discuterons des dernières tendances et innovations.',
                'image' => 'images/conference_annuelle.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Promotion spéciale',
                'description' => 'Profitez de nos offres exceptionnelles.',
                'contenu' => 'Nous offrons des réductions incroyables pour une durée limitée. Ne manquez pas cette occasion !',
                'image' => 'images/promotion_speciale.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
