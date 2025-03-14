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
        // Permissions Table
        Schema::create('permissions', static function (Blueprint $table) {
            $table->id(); // permission.php id
            $table->string('name');       // For MyISAM use string('name', 225); // (or 166 for InnoDB with Redundant/Compact row format)
            $table->timestamps();
        });

        // Roles Table
        Schema::create('roles', static function (Blueprint $table)  {
            // $table->engine('InnoDB');
            $table->id(); // role id
            $table->string('name');       // For MyISAM use string('name', 225); // (or 166 for InnoDB with Redundant/Compact row format)
            $table->timestamps();
        });

        // Pivote Table Model Or User That Has Permission
        Schema::create('User_has_permissions', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->unsignedBigInteger("permission_id");
            $table->foreign("permission_id")->references("id")->on("permissions");
        });

        // Pivote Table Model Or User That Has Role
        Schema::create('User_has_role', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->unsignedBigInteger("role_id");
            $table->foreign("role_id")->references("id")->on("roles");
        });


        // Pivote Table Role That Has permission.php
        Schema::create('role_has_permissions', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("role_id");
            $table->foreign("role_id")->references("id")->on("roles");
            $table->unsignedBigInteger("permission_id");
            $table->foreign("permission_id")->references("id")->on("permissions");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('role_has_permissions');
        Schema::drop('User_has_role');
        Schema::drop('User_has_permissions');
        Schema::drop('roles');
        Schema::drop('permissions');
    }
};
