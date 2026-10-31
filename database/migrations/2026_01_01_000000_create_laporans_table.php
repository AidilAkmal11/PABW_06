<?php
// Lewati file ini jika tabel laporans sudah dibuat pada Modul 4
// (sesuaikan nama kolom dengan project Anda).

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor', 100);
            $table->string('no_hp', 20);
            $table->string('lokasi');
            $table->string('kecamatan', 100);
            $table->unsignedSmallInteger('tinggi_air'); // cm
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
