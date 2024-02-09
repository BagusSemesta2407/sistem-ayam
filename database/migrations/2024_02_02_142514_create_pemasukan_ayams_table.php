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
        Schema::create('pemasukan_ayams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kandang_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('kode_ayam')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->enum('status',['Hidup', 'Dijual'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan_ayams');
    }
};
