<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTT_KHACH_HANG extends Model
{
    use HasFactory;
    protected $table = 'TTT_KHACH_HANG';
    protected $primaryKey = 'id';
    public $incrementing = false; // Nếu TTT_KHACH_HANG không phải là auto-increment
    public $timestamps = true; // Đảm bảo là 'true' nếu bạn sử dụng timestamps
    // Chỉ định các trường ngày tháng sẽ tự động chuyển thành đối tượng Carbon
    protected $dates = ['TTTNgayDangKy'];
}
