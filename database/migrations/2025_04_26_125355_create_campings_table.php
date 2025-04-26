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
        Schema::create('campings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyewa');
            $table->string('nama_alat');
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali');
            $table->integer('jumlah_unit');
            $table->integer('harga_per_hari');
            $table->enum('status', ['dipinjam', 'dikembalikan', 'terlambat']);
            $table->softDeletes(); // Soft Delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campings');
    }
};
