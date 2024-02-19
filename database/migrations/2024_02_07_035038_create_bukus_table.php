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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('judul');
            $table->string('deskripsi', 2000);
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tahunterbit');
            $table->string('picture');
            $table->bigInteger('stok');
            $table->enum('status', ['draft', 'publish']);
            $table->enum('kategori', ['fiksi', 'non']);

            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
