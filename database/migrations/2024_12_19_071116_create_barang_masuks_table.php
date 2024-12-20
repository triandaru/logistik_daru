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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id('no_barang_masuk'); // Primary Key
            $table->unsignedBigInteger('kode_barang'); // Foreign Key
            $table->integer('qty');
            $table->string('origin');
            $table->date('tgl_masuk');
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('kode_barang')
                ->references('kode_barang')->on('barangs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
    }
};
