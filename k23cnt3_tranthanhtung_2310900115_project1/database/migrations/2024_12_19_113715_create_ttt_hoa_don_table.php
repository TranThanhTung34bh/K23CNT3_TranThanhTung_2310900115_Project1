<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ttt_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->string('tttMaHoaDon',255)->unique();
            $table->bigInteger('tttMaKhachHang')->references('id')->on('TTT_KHACH_HANG');
            $table->date('tttNgayHoaDon');
            $table->string('tttHoTenKhachHang',255);
            $table->string('tttEmail',255);
            $table->string('tttDienThoai',255);
            $table->string('tttDiaChi',255);
            $table->float('tttTongGiaTri');
            $table->tinyInteger('tttTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttt_hoa_don');
    }
};
