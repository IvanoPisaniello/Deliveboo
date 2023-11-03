<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_name',
        'address',
        'slug',
        'vat',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->belongsToMany(Type::class);
    }
}
//RESTAURANTS
// public function up(): void
//     {
//         Schema::create('restaurants', function (Blueprint $table) {
//             $table->id();
//             $table->string('name');
//             $table->string('owner_name');
//             $table->string('address', 500);
//             $table->string('slug')->unique();
//             $table->string('telephone_number')->nullable();
//             $table->string('vat');
//             $table->string('image')->nullable();

//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('restaurants');
//     }

    //DISHES
    // public function up(): void
    // {
    //     Schema::create('dishes', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('title');
    //         $table->text('description');
    //         $table->decimal('price', 5, 2);
    //         $table->boolean('visible');
    //         $table->string('image')->nullable();
    //         $table->tinyInteger('discount')->nullable();
    //         $table->text('ingredients');

    //         //restaurant_id missing

    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('dishes');
    // }

    //ORDERS
    // public function up(): void
    // {
    //     Schema::create('orders', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('firstname');
    //         $table->string('lastname');
    //         $table->string('email')->nullable();
    //         $table->string('address');
    //         $table->decimal('amount', 5, 2);
    //         $table->integer('delivery_state');
            
    //         //restaurant_id missing

    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('orders');
    // }

    //TYPES
    // public function up(): void
    // {
    //     Schema::create('types', function (Blueprint $table) {
    //         $table->id();
    //         $table->string("name")->nullable();
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('types');
    // }

    //DISH ORDER
    // public function up(): void
    // {
    //     Schema::create('dish_order', function (Blueprint $table) {
    //         $table->id();
            
    //         $table->unsignedBigInteger('order_id')->nullable();
    //         $table->foreign('order_id')->references('id')->on('orders');

    //         $table->unsignedBigInteger('dish_id')->nullable();
    //         $table->foreign('dish_id')->references('id')->on('dishes');

    //         $table->integer('quantity');
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('dish_order');
    // }

    //RESTAURANT TYPE
    // public function up(): void
    // {
    //     Schema::create('restaurant_type', function (Blueprint $table) {
    //         $table->id();

    //         $table->unsignedBigInteger('restaurant_id')->nullable();
    //         $table->foreign('restaurant_id')->references('id')->on('restaurants');

    //         $table->unsignedBigInteger('type_id')->nullable();
    //         $table->foreign('type_id')->references('id')->on('types');

    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('restaurant_type');
    // }

    //foreigns
    // public function up(): void
    // {
    //     Schema::table('restaurants', function (Blueprint $table) {
    //         //foreign key che permette la ricerca di un restaurant a partire da uno user
    //         $table->unsignedBigInteger('user_id')->nullable();
    //         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    //     });

    //     Schema::table('dishes', function (Blueprint $table) {
    //         //foreign key che permette la ricerca dei dishes di un restaurant
    //         $table->unsignedBigInteger('restaurant_id')->nullable();
    //         $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');

    //         //foreign key che permette la ricerca della category di un dish
    //         $table->unsignedBigInteger('category_id')->nullable();
    //         $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    //     });

    //     Schema::table('orders', function (Blueprint $table) {
    //         //foreign key che permette la ricerca degli orders di un restaurant
    //         $table->unsignedBigInteger('restaurant_id')->nullable();
    //         $table->foreign('restaurant_id')->references('id')->on("restaurants")->onDelete('cascade');
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::table('restaurants', function (Blueprint $table) {
    //         $table->dropForeign('restaurants_user_id_foreign');
    //         $table->dropColumn('user_id');
    //     });

    //     Schema::table('dishes', function (Blueprint $table) {
    //         $table->dropForeign('dishes_restaurant_id_foreign');
    //         $table->dropColumn('restaurant_id');

    //         $table->dropForeign('dishes_category_id_foreign');
    //         $table->dropColumn('category_id');
    //     });

    //     Schema::table('orders', function (Blueprint $table) {
    //         $table->dropForeign('orders_restaurant_id_foreign');
    //         $table->dropColumn('restaurant_id');
    //     });
    // }