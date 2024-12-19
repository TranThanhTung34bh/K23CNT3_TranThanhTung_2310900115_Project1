<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class QuanTri extends Authenticatable
{
    use Notifiable;

    protected $table = 'ttt_quan_tri';

    protected $fillable = [
        'ttt_tai_khoan',
        'ttt_email',
        'ttt_mat_khau',
        'ttt_trang_thai',
    ];

    protected $hidden = [
        'ttt_mat_khau',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->ttt_mat_khau;
    }
}

