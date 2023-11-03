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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->text('description');
            $table->float('price');
            $table->float('price_after_discount');
            $table->integer('discount')->nullable();
            $table->integer('category_id');
            $table->string('image');
            $table->integer('best_seller')->default(0);
            $table->boolean('status')->default(1);
            $table->integer('stock');
            $table->string('code');
            $table->integer('number_of_pages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
