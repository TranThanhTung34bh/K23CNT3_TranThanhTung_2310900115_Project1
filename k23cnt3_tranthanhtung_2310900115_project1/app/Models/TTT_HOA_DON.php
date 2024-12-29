<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTT_HOA_DON extends Model
{
    use HasFactory;
    protected $table = 'TTT_HOA_DON';
    protected $primaryKey = 'id';
    public $incrementing = false; // Nếu `TTT_HOA_DON` không phải là auto-increment
    public $timestamps = true; // Đảm bảo là 'true' nếu bạn sử dụng timestamps
}