<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TTT_QUAN_TRIController extends Controller
{
    // Hiển thị form đăng nhập
    public function TttLogin()
    {
        return view('TttLogin.ttt-login');
    }

    // Xử lý logic đăng nhập
    public function TttLoginSubmit(Request $request)
    {
        // Xác thực thông tin đăng nhập
        $credentials = $request->validate([
            'ttt_email' => ['required', 'email'],
            'ttt_mat_khau' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credentials['ttt_email'], 'password' => $credentials['ttt_mat_khau']])) {
            // Đăng nhập thành công, chuyển hướng đến trang dashboard
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // Đăng nhập thất bại, trả về form với thông báo lỗi
        return back()->withErrors([
            'ttt_email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('ttt_email');
    }

    // Đăng xuất
    public function TttLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/ttt-login');
    }
}
