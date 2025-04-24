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
        Schema::table('community_members', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('community_members', function (Blueprint $table) {
            $table->enum('status', ['null','invited','regularUser','rejected','pending'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('communities', function (Blueprint $table) {
            $table->dropColumn(['status']);
        });
    }
};
