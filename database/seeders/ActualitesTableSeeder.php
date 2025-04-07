<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'contenu' => 'Nous offrons des réductions incroyables pour une durée limitée. Ne manquez pas cette occasion unique de profiter de nos offres exceptionnelles !',
                'image' => 'img/fond.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Nouveau partenariat stratégique',
                'description' => 'Nous avons conclu un partenariat stratégique.',
                'contenu' => 'Ce partenariat nous permettra d\'offrir de meilleurs services à nos clients.',
                'image' => 'img/partenariat.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Ouverture d\'une nouvelle succursale',
                'description' => 'Une nouvelle succursale ouvre ses portes.',
                'contenu' => 'Nous sommes heureux d\'annoncer l\'ouverture de notre nouvelle succursale dans votre région.',
                'image' => 'img/succursale.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Webinaire sur les innovations technologiques',
                'description' => 'Inscrivez-vous à notre webinaire.',
                'contenu' => 'Découvrez les dernières innovations technologiques lors de notre webinaire exclusif.',
                'image' => 'img/webinaire.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Campagne de recrutement',
                'description' => 'Rejoignez notre équipe dynamique.',
                'contenu' => 'Nous recherchons des talents pour rejoindre notre équipe. Consultez nos offres d\'emploi.',
                'image' => 'img/recrutement.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Mise à jour de notre application mobile',
                'description' => 'Découvrez les nouvelles fonctionnalités.',
                'contenu' => 'Notre application mobile a été mise à jour avec des fonctionnalités améliorées pour une meilleure expérience utilisateur.',
                'image' => 'img/application.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Lancement d\'un programme de fidélité',
                'description' => 'Récompensez votre fidélité.',
                'contenu' => 'Nous lançons un programme de fidélité pour remercier nos clients les plus fidèles.',
                'image' => 'img/fidelite.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Rapport annuel 2023',
                'description' => 'Consultez notre rapport annuel.',
                'contenu' => 'Notre rapport annuel 2023 est maintenant disponible. Découvrez nos réalisations et nos perspectives.',
                'image' => 'img/rapport.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Concours exclusif',
                'description' => 'Participez à notre concours.',
                'contenu' => 'Tentez votre chance pour gagner des prix incroyables en participant à notre concours exclusif.',
                'image' => 'img/concours.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
