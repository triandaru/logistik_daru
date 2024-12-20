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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user'); // Primary key with custom name 'id_user'
            $table->string('nama');
            $table->string('email', 100)->unique(); // Unique constraint on 'username'
            $table->string('password'); // Foreign key reference to Hak Akses table
            $table->unsignedBigInteger('role');
            $table->timestamps(); // Automatically adds created_at and updated_at columns

            // Set foreign key constraint
            $table->foreign('role')->references('id_role')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
