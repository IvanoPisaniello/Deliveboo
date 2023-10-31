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
        Schema::table('restaurants', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id') // rendo la colonna user_id una foreign key
                ->references('id') // che fa riferimento alla colonna id
                ->on("users") // della tabella users
                // se l'utente viene cancellato, cancella anche il suo ristorante
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropForeign('restaurants_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
};
