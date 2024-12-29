<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TTT_QUAN_TRIController extends Controller
{
    // Hiển thị form đăng nhập
    public function TTTLogin()
    {
        return view('TTTLogin.TTT-login');
    }

    // Xử lý logic đăng nhập
    public function TTTLoginSubmit(Request $request)
    {
        // Xác thực thông tin đăng nhập
        $credentials = $request->validate([
            'TTT_email' => ['required', 'email'],
            'TTT_mat_khau' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credentials['TTT_email'], 'password' => $credentials['TTT_mat_khau']])) {
            // Đăng nhập thành công, chuyển hướng đến trang dashboard
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // Đăng nhập thất bại, trả về form với thông báo lỗi
        return back()->withErrors([
            'TTT_email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('TTT_email');
    }

    // Đăng xuất
    public function TTTLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/TTT-login');
    }
}
