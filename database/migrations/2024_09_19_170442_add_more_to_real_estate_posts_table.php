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
        Schema::table('real_estate_posts', function (Blueprint $table) {
            // Commute
            // $table->string('commute_method')->nullable(); // driving, walking, cycling, transit
            // $table->integer('max_drive_time')->nullable(); // max driving time in minutes

            // HOA Fees
            $table->decimal('max_hoa_fees', 8, 2)->nullable(); // HOA fees per month

            // Stories (Single, Multi)
            $table->enum('story', ['single', 'multi'])->nullable();

            // Parking (Carport, RV, Boat)
            $table->boolean('has_carport')->default(false);
            $table->boolean('has_rv_boat_parking')->default(false);

            // Heating/Cooling
            $table->boolean('has_forced_air')->default(false);
            $table->boolean('has_central_air')->default(false);
            $table->boolean('has_central_heat')->default(false);

            // Outside Features (Pool, Spa, Horse Facility)
            // $table->boolean('has_spa')->default(false);
            // $table->boolean('has_horse_facility')->default(false);


            // Community Amenities
            // $table->string('community_amenities')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('real_estate_posts', function (Blueprint $table) {
            // HOA Fees
            $table->dropColumn('max_hoa_fees');

            // Stories
            $table->dropColumn('story');

            // Parking
            $table->dropColumn('has_carport');
            $table->dropColumn('has_boat_parking');

            // Heating/Cooling
            $table->dropColumn('has_forced_air');
            $table->dropColumn('has_central_air');
            $table->dropColumn('has_central_heat');

            // Outside Features
            // $table->dropColumn('has_spa');
            // $table->dropColumn('has_horse_facility');

            // Lot Views
            // $table->dropColumn('has_waterfront_view');
            // $table->dropColumn('has_river_view');
        });
    }
};
