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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->text('meta_keywords')->nullable()->after('meta_description');
            $table->string('og_image')->nullable()->after('favicon');
            $table->string('sidebar_image')->nullable()->after('og_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['meta_keywords', 'og_image', 'sidebar_image']);
        });
    }
};
