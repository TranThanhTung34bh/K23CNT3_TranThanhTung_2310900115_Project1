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
        Schema::create('TTT_QUAN_TRI', function (Blueprint $table) {
            $table->id();
            $table->string('tttTaiKhoan',255)->unique();
            $table->string('tttMatKhau',255);
            $table->tinyInteger('tttTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TTT_QUAN_TRI');
    }
};
