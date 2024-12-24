<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TTT_QUAN_TRITabbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tttMatKhau=md5("12345678");
        DB::table('TTT_QUAN_TRI')->INSERT([
            'tttTaiKhoan'=>'tung2@gmail.com',
            'tttMatKhau'=>0,
            'tttTrangThai'=>0
        ]);
        DB::table('TTT_QUAN_TRI')->INSERT([
            'tttTaiKhoan'=>'tung3@gmail.com',
            'tttMatKhau'=>0,
            'tttTrangThai'=>0
        ]);
    }
}
