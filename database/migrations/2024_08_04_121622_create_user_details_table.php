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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->text('bio')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('occupation_id');


            // In the migration file for UserDetails
            $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('set null');
            $table->foreignId('state_id')->nullable()->constrained('states')->onDelete('set null');
            $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('set null');

//            $table->unsignedBigInteger('country_id');
//            $table->string('state')->nullable();
//            $table->string('city')->nullable();
//            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');


            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('occupation_id')->references('id')->on('occupations')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
