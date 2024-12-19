<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TTT_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table("TTT_SAN_PHAM")->insert([
            'tttMaSanPham'=>'sanpham01',
            'tttTenSanPham'=>'cay 2',
            'tttHinhAnh'=> 'anh',
            'tttSoLuong'=>100,
            'tttDonGia'=>700000,
            'tttMaLoai'=>1,
            'tttTrangThai'=>0,
        ]);
        DB::table("TTT_SAN_PHAM")->insert([
            'tttMaSanPham'=>'sanpham02',
            'tttTenSanPham'=>'cay 3',
            'tttHinhAnh'=> 'anh',
            'tttSoLuong'=>100,
            'tttDonGia'=>600400,
            'tttMaLoai'=>2,
            'tttTrangThai'=>0,
        ]);
        
        
        DB::table("TTT_SAN_PHAM")->insert([
            'tttMaSanPham'=>'sanpham03',
            'tttTenSanPham'=>'cay 4',
            'tttHinhAnh'=> 'anh',
            'tttSoLuong'=>10260,
            'tttDonGia'=>40000,
            'tttMaLoai'=>3,
            'tttTrangThai'=>0,
        ]);
        
        DB::table("TTT_SAN_PHAM")->insert([
            'tttMaSanPham'=>'sanpham04',
            'tttTenSanPham'=>'cay 5',
            'tttHinhAnh'=> 'anh',
            'tttSoLuong'=>1010,
            'tttDonGia'=>66000,
            'tttMaLoai'=>4,
            'tttTrangThai'=>0,
        ]);
        
        DB::table("TTT_SAN_PHAM")->insert([
            'tttMaSanPham'=>'sanpham05',
            'tttTenSanPham'=>'cay 5',
            'tttHinhAnh'=> 'anh',
            'tttSoLuong'=>1020,
            'tttDonGia'=>60000,
            'tttMaLoai'=>5,
            'tttTrangThai'=>0,
        ]);
        
        DB::table("TTT_SAN_PHAM")->insert([
            'tttMaSanPham'=>'sanpham01',
            'tttTenSanPham'=>'cay 6',
            'tttHinhAnh'=> 'anh',
            'tttSoLuong'=>1001,
            'tttDonGia'=>640000,
            'tttMaLoai'=>6,
            'tttTrangThai'=>0,
        ]);
        
        DB::table("TTT_SAN_PHAM")->insert([
            'tttMaSanPham'=>'sanpham01',
            'tttTenSanPham'=>'cay 7',
            'tttHinhAnh'=> 'anh',
            'tttSoLuong'=>200,
            'tttDonGia'=>44400000,
            'tttMaLoai'=>7,
            'tttTrangThai'=>0,
        ]);
    }
}
