<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Un commentaire d'article n'est affiché qu'après validation par le cabinet.
     * Les commentaires existants passent à « non validé » (beaucoup sont du spam).
     */
    public function up(): void
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->boolean('valide')->default(false)->after('contenu')->index();
        });
    }

    public function down(): void
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->dropColumn('valide');
        });
    }
};
