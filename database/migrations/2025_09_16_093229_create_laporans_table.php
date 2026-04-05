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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('detail');
            $table->date('tanggal');
            $table->string('foto');
            $table->enum('status', ['pending', 'proses', 'selesai']);
            $table->timestamps();

            // Relation
            $table->unsignedBigInteger('pelapor_id');
            $table->foreign('pelapor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
