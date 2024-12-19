<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TTT_LOAI_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('TTT_LOAI_SAN_PHAM')->insert([
            'tttMaLoai'=>'L001',
            'tttTenLoai'=>'cây cảnh văn phòng',
            'tttTrangThai'=>0
        ]);
        
        DB::table('TTT_LOAI_SAN_PHAM')->insert([
            'tttMaLoai'=>'L002',
            'tttTenLoai'=>'cây cảnh để bàn',
            'tttTrangThai'=>0
        ]);
        DB::table('TTT_LOAI_SAN_PHAM')->insert([
            'tttMaLoai'=>'L003',
            'tttTenLoai'=>'cây cảnh phong thủy',
            'tttTrangThai'=>0
        ]);
        DB::table('TTT_LOAI_SAN_PHAM')->insert([
            'tttMaLoai'=>'L004',
            'tttTenLoai'=>'cây cảnh phong thủy',
            'tttTrangThai'=>0
        ]);
    }
}
