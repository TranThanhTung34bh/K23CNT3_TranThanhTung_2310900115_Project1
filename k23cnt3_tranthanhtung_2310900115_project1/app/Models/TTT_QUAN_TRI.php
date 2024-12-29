<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class QuanTri extends Authenticatable
{
    use Notifiable;

    protected $table = 'TTT_quan_tri';

    protected $fillable = [
        'TTT_tai_khoan',
        'TTT_email',
        'TTT_mat_khau',
        'TTT_trang_thai',
    ];

    protected $hidden = [
        'TTT_mat_khau',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->TTT_mat_khau;
    }
}

