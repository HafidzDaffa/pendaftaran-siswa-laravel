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
        Schema::create('informasi_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama_lengkap')->nullable();
            $table->string('ttl')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->text('alamat')->nullable();
            $table->string('nama_ortu')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('pekerjaan_ortu')->nullable();
            $table->integer('penghasilan_ortu')->nullable();
            $table->enum('kepemilikan_rumah', ['mengontrak', 'milik_pribadi'])->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('akta_kelahiran')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('ktp_ortu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_siswas');
    }
};
