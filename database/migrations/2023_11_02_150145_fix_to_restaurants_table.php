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
            $table->dropColumn('name');
            $table->dropColumn('restaurant_owner');
            $table->dropColumn('address');
            $table->dropColumn('vat');

            $table->dropForeign('restaurants_user_id_foreign');
            $table->dropColumn('user_id');

            $table->dropForeign('restaurants_type_id_foreign');
            $table->dropColumn('type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('name');
            $table->string('restaurant_owner');
            $table->string('address');
            $table->string('vat');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }
};
