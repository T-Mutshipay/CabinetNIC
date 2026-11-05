<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Auteur affiché sur l'article. Facultatif : les articles existants n'en ont pas.
     *
     * En production, la colonne a été ajoutée en avril 2025 par une migration créée sur le
     * serveur et jamais versionnée : dans ce cas, elle est seulement rendue facultative.
     */
    public function up(): void
    {
        Schema::table('actualites', function (Blueprint $table) {
            if (Schema::hasColumn('actualites', 'auteur')) {
                $table->string('auteur')->nullable()->change();
            } else {
                $table->string('auteur')->nullable()->after('contenu');
            }
        });
    }

    public function down(): void
    {
        Schema::table('actualites', function (Blueprint $table) {
            $table->dropColumn('auteur');
        });
    }
};
