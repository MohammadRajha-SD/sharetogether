<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('real_estate_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->decimal('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('sqft')->nullable();
            $table->decimal('acre_lot', 4, 2);
            $table->string('address');
            $table->integer('state');
            $table->integer('city');
            $table->string('property_type');
            $table->enum('listing_type', ['rent', 'sale', 'buy']); // Rent or Sale
            $table->integer('garage')->default(0);
            $table->integer('year_built')->nullable(); // Year built added


            $table->string('exterior_image_url')->nullable();
            $table->string('kitchen_image_url')->nullable();
            $table->string('bathroom_image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estate_posts');
    }
};
