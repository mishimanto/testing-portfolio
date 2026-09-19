<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('counters', function (Blueprint $table) {
            $table->text('description')->nullable()->after('suffix');
        });

        $featuredCounterId = DB::table('counters')->orderBy('sort_order')->orderBy('id')->value('id');

        if ($featuredCounterId) {
            DB::table('counters')->where('id', $featuredCounterId)->update([
                'description' => 'Business consulting consultants provide expert advice and guidance to help businesses improve their performance and efficiency.',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('counters', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
