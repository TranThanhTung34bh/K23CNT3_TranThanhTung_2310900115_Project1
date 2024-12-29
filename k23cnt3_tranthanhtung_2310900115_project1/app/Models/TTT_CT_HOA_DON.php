<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTT_CT_HOA_DON extends Model
{
    use HasFactory;
    protected $table = 'TTT_CT_HOA_DON';
    protected $primaryKey = 'id';
    public $incrementing = false; // Nếu TTTnhacc không phải là auto-increment
    public $timestamps = true; // Đảm bảo là 'true' nếu bạn sử dụng timestamps
}