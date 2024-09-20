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
            $table->boolean('has_waterfront_view')->default(false);
            $table->boolean('has_river_view')->default(false);
            $table->boolean('has_hill_mtn_view')->default(false); 
            $table->boolean('has_cul_de_sac')->default(false);
            $table->boolean('has_ocean_view')->default(false);
            $table->boolean('has_corner_lot')->default(false);
            $table->boolean('has_lake_view')->default(false);
            $table->boolean('has_golf_course_lot')->default(false);
            $table->boolean('has_golf_course_vi')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('real_estate_posts', function (Blueprint $table) {
            $table->dropColumn([
                'has_waterfront_view',
                'has_river_view',
                'has_hill_mtn_view',
                'has_cul_de_sac',
                'has_ocean_view',
                'has_corner_lot',
                'has_lake_view',
                'has_golf_course_lot',
                'has_golf_course_vi',
            ]);
        });
    }
};
