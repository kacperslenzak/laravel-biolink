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
        Schema::table('profile_settings', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('background_effect');
            $table->dropColumn('username_effect');
            $table->dropColumn('profile_opacity');
            $table->dropColumn('profile_blur');
            $table->dropColumn('username_glow');
            $table->dropColumn('badge_glow');
        });

        Schema::table('profile_settings', function (Blueprint $table) {
            $table->string('description')->nullable();
            $table->string('background_effect')->nullable();
            $table->string('username_effect')->nullable();
            $table->integer('profile_opacity')->nullable();
            $table->integer('profile_blur')->nullable();
            $table->boolean('username_glow')->nullable();
            $table->boolean('badge_glow')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile_settings', function (Blueprint $table) {
            //
        });
    }
};
