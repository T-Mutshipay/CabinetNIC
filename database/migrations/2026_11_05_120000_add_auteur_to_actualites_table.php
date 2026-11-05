<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Auteur affiché sur l'article. Facultatif : les articles existants n'en ont pas.
     */
    public function up(): void
    {
        Schema::table('actualites', function (Blueprint $table) {
            $table->string('auteur')->nullable()->after('contenu');
        });
    }

    public function down(): void
    {
        Schema::table('actualites', function (Blueprint $table) {
            $table->dropColumn('auteur');
        });
    }
};
