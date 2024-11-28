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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8); // Adjust precision and scale as needed
            $table->text('description');// Fixed typo from 'discription' to 'description'
            $table->string('image')->nullable(); // Path to the image, if applicable
            $table->unsignedBigInteger('brand_id'); // Foreign key column
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('brand_id')
                  ->references('id')
                  ->on('brands')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
