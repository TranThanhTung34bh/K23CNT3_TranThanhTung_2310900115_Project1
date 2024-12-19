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
        Schema::create('ttt_ct_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('HoaDonID')->references('id')->on('TTT_HOA_DON');
            $table->bigInteger('SanPhamID')->references('id')->on('TTT_SAN_PHAM');
            $table->integer('tttSoluongMua');
            $table->float('tttDonGiaMua');
            $table->float('tttDonGiaTien');
            $table->tinyInteger('tttTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttt_ct_hoa_don');
    }
};
