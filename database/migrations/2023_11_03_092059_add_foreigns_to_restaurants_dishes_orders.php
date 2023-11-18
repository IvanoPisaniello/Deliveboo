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
            //foreign key che permette la ricerca di un restaurant a partire da uno user
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('dishes', function (Blueprint $table) {
            //foreign key che permette la ricerca dei dishes di un restaurant
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');

            //foreign key che permette la ricerca della category di un dish
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::table('orders', function (Blueprint $table) {
            //foreign key che permette la ricerca degli orders di un restaurant
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on("restaurants")->onDelete('cascade');
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

        Schema::table('dishes', function (Blueprint $table) {
            $table->dropForeign('dishes_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');

            $table->dropForeign('dishes_category_id_foreign');
            $table->dropColumn('category_id');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
        });
    }
};
