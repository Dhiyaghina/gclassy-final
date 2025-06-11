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
        Schema::create('tugas_materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
            $table->enum('tipe', ['tugas', 'materi']);
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->integer('poin')->nullable(); // hanya untuk tugas
            $table->dateTime('deadline')->nullable(); // hanya untuk tugas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_materi');
    }
};
