<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //
}

//DISHES
// public function up(): void
//     {
//         Schema::create('dishes', function (Blueprint $table) {
//             $table->id();
//             $table->string('title');
//             $table->text('description');
//             $table->decimal('price', 5, 2);
//             $table->boolean('visible');
//             $table->string('image')->nullable();
//             $table->tinyInteger('discount')->nullable();
//             $table->text('ingredients');

//             $table->unsignedBigInteger('restaurant_id')->nullable();
//             $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');

//             $table->unsignedBigInteger('category_id')->nullable();
//             $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         $table->dropForeign('dishes_restaurant_id_foreign');
//         $table->dropColumn('restaurant_id');

//         Schema::dropForeign('dishes_category_id_foreign');
//         Schema::dropColumn('category_id');

//         Schema::dropIfExists('dishes');
//     }

// //CATEGORIES
// public function up(): void
//     {
//         Schema::create('categories', function (Blueprint $table) {
//             $table->id();
//             $table->string('title')->nullable();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('categories');
//     }

// //DISH_ORDER
// public function up(): void
//     {
//         Schema::create('dish_order', function (Blueprint $table) {
//             $table->unsignedBigInteger('order_id')->nullable();
//             $table->foreign('order_id')->references('id')->on('orders');

//             $table->unsignedBigInteger('dish_id')->nullable();
//             $table->foreign('dish_id')->references('id')->on('dishes');

//             $table->integer('quantity');
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('dish_order');
//     }

// //ORDERS
// public function up(): void
//     {
//         Schema::create('orders', function (Blueprint $table) {
//             $table->id();
//             $table->string('firstname');
//             $table->string('lastname');
//             $table->string('email')->nullable();
//             $table->string('address');
//             $table->decimal('amount', 5, 2);
//             $table->integer('delivery_state');

//             $table->unsignedBigInteger('restaurant_id')->nullable();
//             $table->foreign('restaurant_id')->references('id')->on("restaurants")->onDelete('cascade');

//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         $table->dropForeign('orders_restaurant_id_foreign');
//         $table->dropColumn('restaurant_id');
//         Schema::dropIfExists('orders');
//     }

// //RESTAURANTS
// public function up(): void
//     {
//         Schema::create('restaurants', function (Blueprint $table) {
//             $table->id();
//             $table->string('name');
//             $table->string('address', 500);
//             $table->string('slug')->unique();
//             $table->string('telephone_number')->nullable();
//             $table->string('vat');
//             $table->string('image')->nullable();

//             $table->unsignedBigInteger('user_id')->nullable();
//             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

//             $table->unsignedBigInteger('type_id')->nullable();
//             $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         $table->dropForeign('restaurants_user_id_foreign');
//         $table->dropColumn('user_id');

//         $table->dropForeign('restaurants_type_id_foreign');
//         $table->dropColumn('type_id');
//         Schema::dropIfExists('restaurants');
//     }

// //TYPES
// public function up(): void
//     {
//         Schema::create('types', function (Blueprint $table) {
//             $table->id();
//             $table->string("name")->nullable();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('types');
//     }
