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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("content");
            $table->unsignedBigInteger("categoryID");
            $table->unsignedBigInteger("userId");
            $table->integer("views");
            $table->integer("reactions");
            $table->integer("down_votes");
            $table->integer("up_votes");
            $table->string("status");
            $table->timestamps();
            // Foreign key constraints
            $table->foreign("categoryID")->references("id")->on("categories");
            $table->foreign("userId")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
