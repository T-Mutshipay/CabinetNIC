<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [
            'Ceci est un commentaire intéressant.',
            'Merci pour les informations, c\'est très utile !',
            'Je suis impatient de participer à cet événement.',
            'Une actualité très bien rédigée.',
            'Bravo pour cette initiative !',
            'Je partage entièrement votre point de vue.',
            'Cela mérite davantage d\'attention.',
        ];

        $data = [];
        for ($actualiteId = 1; $actualiteId <= 7; $actualiteId++) {
            for ($i = 0; $i < rand(1, 3); $i++) { 
                $data[] = [
                    'actualite_id' => $actualiteId,
                    'user_id' => rand(1, 10),
                    'contenu' => $comments[array_rand($comments)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('commentaires')->insert($data);
    }
}
