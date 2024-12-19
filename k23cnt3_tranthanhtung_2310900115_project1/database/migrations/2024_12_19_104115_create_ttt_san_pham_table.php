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
        Schema::create('ttt_san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('tttMaSanPhamham',255)->unique();
            $table->string('tttTenSanPham',255);
            $table->string('tttHinhAnh',255);
            $table->tinyInteger('tttSoLuong');
            $table->float('tttDonGia');
            $table->bigInteger('tttMaLoai')->references('id')->on('TTT_LOAI_SAN_PHAM');
            $table->tinyInteger('tttSoLuong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttt_san_pham');
    }
};
