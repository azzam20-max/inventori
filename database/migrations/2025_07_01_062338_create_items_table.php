<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // kolom id otomatis
            $table->string('kode_barang')->unique(); // kode barang unik
            $table->string('name'); // nama barang
            $table->integer('stock'); // stok barang
            $table->decimal('price', 10, 2); // harga barang (max 10 digit, 2 desimal)
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
