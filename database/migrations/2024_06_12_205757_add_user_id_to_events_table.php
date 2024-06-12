<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Ajouter la colonne user_id
            $table->unsignedBigInteger('user_id')->after('description')->nullable();

            // Ajouter la clé étrangère
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
             // Supprimer la clé étrangère
             $table->dropForeign(['user_id']);

             // Supprimer la colonne user_id
             $table->dropColumn('user_id');
        });
    }
};
