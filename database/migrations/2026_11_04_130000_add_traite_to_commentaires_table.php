<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Suivi des messages de contact : le cabinet indique ceux qui ont reçu une réponse.
     */
    public function up(): void
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->boolean('traite')->default(false)->after('valide')->index();
        });
    }

    public function down(): void
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->dropColumn('traite');
        });
    }
};
