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
        Schema::create('penguruses', function (Blueprint $table) {
    $table->id();
    $table->foreignId('anggota_id')->constrained()->cascadeOnDelete();
    $table->foreignId('jabatan_id')->constrained()->cascadeOnDelete();
    $table->foreignId('periode_id')->constrained()->cascadeOnDelete();
    $table->date('tanggal_mulai')->nullable();
    $table->date('tanggal_selesai')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguruses');
    }
};
