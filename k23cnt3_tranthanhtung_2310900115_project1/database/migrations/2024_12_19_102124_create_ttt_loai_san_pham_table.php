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
        Schema::create('ttt_loai_san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('tttMaLoai',255)->unique();
            $table->string('tttTenLoai',255);
            $table->tinyInteger('tttTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttt_loai_san_pham');
    }
};
