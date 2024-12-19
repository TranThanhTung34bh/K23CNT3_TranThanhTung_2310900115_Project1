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
        Schema::create('ttt_khach_hang', function (Blueprint $table) {
            $table->id();
            $table->string('tttMaKhachHang',255)->unique();
            $table->string('tttHoTenKhachHang',255);
            $table->string('tttEmail',255);
            $table->string('tttMatKhau',255);
            $table->string('tttDienThoai',255);
            $table->string('tttDiaChi',255);
            $table->date('tttNgayDangKy');
            $table->tinyInteger('tttTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttt_khach_hang');
    }
};
