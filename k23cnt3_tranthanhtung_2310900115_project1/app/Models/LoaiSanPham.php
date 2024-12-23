<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;

    protected $table = 'ttt_loai_san_pham';
    protected $primaryKey = 'ttt_id';

    protected $fillable = [
        'ttt_ten_loai',
        'ttt_mo_ta',
    ];
}
