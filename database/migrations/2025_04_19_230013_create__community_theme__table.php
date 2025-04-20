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
        Schema::create('community_theme', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("communityID");
            $table->unsignedBigInteger("ThemeID");
            $table->foreign("communityID")->on("communities")->references('id')->cascadeOnDelete();
            $table->foreign("themeID")->on("themes")->references('id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_theme');
    }
};
