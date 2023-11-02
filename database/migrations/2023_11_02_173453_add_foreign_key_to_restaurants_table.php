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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('restaurant_name');
            $table->dropColumn('vat');
            $table->dropColumn('user_address');

            $table->dropForeign('users_restaurant_id_foreign');

            $table->dropColumn('restaurant_id');

            $table->dropForeign('users_type_id_foreign');

            $table->dropColumn('type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('restaurant_name')->nullable();
            $table->string('vat')->nullable();
            $table->string('user_address')->nullable();

            $table->unsignedBigInteger('restaurant_id')->nullable();

            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants')->onDelete('cascade');


            $table->unsignedBigInteger('type_id')->nullable();

            $table->foreign('type_id')->references('id')
                ->on('types')->onDelete('cascade');
        });
    }
};
