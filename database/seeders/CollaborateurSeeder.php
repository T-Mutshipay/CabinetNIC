<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'nom_complet' => 'Dahlia Muya',
                'post' => 'Secrétaire',
                'email' => 'dahliamuya@gmail.com',
                'description' => 'Secrétaire expérimentée dans la gestion administrative et les services juridiques.',
                'image' => 'img/secretaire_dahlia.JPEG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_complet' => 'Clarisse Odia Munyinga',
                'post' => 'Assistante',
                'email' => 'clarisseodia8@gmail.com',
                'description' => 'Gérante en communication au Cabinet N.I.C et Associés, depuis novembre 2024',
                'image' => 'img/assistante_clarisse.JPEG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
