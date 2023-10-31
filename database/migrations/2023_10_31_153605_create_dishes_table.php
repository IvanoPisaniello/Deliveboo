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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 5, 2);
            $table->boolean('visible');
            $table->string('image')->nullable();
            $table->tinyInteger('discount')->nullable();
            $table->text('ingredients');

            // $table->unsignedBigInteger('resturant_id');
            // $table->foreign('resturant_id')->references('id')->on('resturants');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropForeign('dishes_resturant_id');
        Schema::dropIfExists('dishes');
    }
};
