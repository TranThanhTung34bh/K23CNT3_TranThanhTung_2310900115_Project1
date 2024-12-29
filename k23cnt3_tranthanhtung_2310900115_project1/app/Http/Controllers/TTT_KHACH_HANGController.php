<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TTT_KHACH_HANG; 
class TTT_KHACH_HANGcontroller extends Controller
{
    //
    // CRUD
    // list
    public function TTTList()
    {
        $khachhangs = TTT_KHACH_HANG::all();
        return view('TTTAdmins.TTTkhachhang.TTT-list',['khachhangs'=>$khachhangs]);
    }
    // detail 
    public function TTTDetail($id)
    {
        $TTTkhachhang = TTT_KHACH_HANG::where('id',$id)->first();
        return view('TTTAdmins.TTTkhachhang.TTT-detail',['TTTkhachhang'=>$TTTkhachhang]);
    }
    // create
    public function TTTCreate()
    {
        return view('TTTAdmins.TTTkhachhang.TTT-create');
    }
    //post
    public function TTTCreateSubmit(Request $request)
    {
        $validate = $request->validate([
            'TTTMaKhachHang' => 'required|unique:TTT_khach_hang,TTTMaKhachHang',
            'TTTHoTenKhachHang' => 'required|string',
            'TTTEmail' => 'required|email|unique:TTT_khach_hang,TTTEmail',  
            'TTTMatKhau' => 'required|min:6',
            'TTTDienThoai' => 'required|numeric|unique:TTT_khach_hang,TTTDienThoai',  
            'TTTDiaChi' => 'required|string',
            'TTTNgayDangKy' => 'required|date',  
            'TTTTrangThai' => 'required|in:0,1,2',
        ]);

        $TTTkhachhang = new TTT_KHACH_HANG;
        $TTTkhachhang->TTTMaKhachHang = $request->TTTMaKhachHang;
        $TTTkhachhang->TTTHoTenKhachHang = $request->TTTHoTenKhachHang;
        $TTTkhachhang->TTTEmail = $request->TTTEmail;
        $TTTkhachhang->TTTMatKhau = $request->TTTMatKhau;
        $TTTkhachhang->TTTDienThoai = $request->TTTDienThoai;
        $TTTkhachhang->TTTDiaChi = $request->TTTDiaChi;
        $TTTkhachhang->TTTNgayDangKy = $request->TTTNgayDangKy;
        $TTTkhachhang->TTTTrangThai = $request->TTTTrangThai;

        $TTTkhachhang->save();

        return redirect()->route('TTTadmins.TTTkhachhang');
    }

    // edit
    public function TTTEdit($id)
    {
        // Lấy khách hàng theo id
        $TTTkhachhang = TTT_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$TTTkhachhang) {
            return redirect()->route('TTTadmins.TTTkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Trả về view để chỉnh sửa khách hàng
        return view('TTTAdmins.TTTkhachhang.TTT-edit', ['TTTkhachhang' => $TTTkhachhang]);
    }
    
    public function TTTEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $validate = $request->validate([
            'TTTMaKhachHang' => 'required|unique:TTT_khach_hang,TTTMaKhachHang,' . $id, // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'TTTHoTenKhachHang' => 'required|string',
            'TTTEmail' => 'required|email|unique:TTT_khach_hang,TTTEmail,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'TTTMatKhau' => 'nullable|min:6', // Mật khẩu không bắt buộc khi cập nhật
            'TTTDienThoai' => 'required|numeric|unique:TTT_khach_hang,TTTDienThoai,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'TTTDiaChi' => 'required|string',
            'TTTNgayDangKy' => 'required|date',
            'TTTTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Lấy khách hàng theo id
        $TTTkhachhang = TTT_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$TTTkhachhang) {
            return redirect()->route('TTTadmins.TTTkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Cập nhật các giá trị từ request
        $TTTkhachhang->TTTMaKhachHang = $request->TTTMaKhachHang;
        $TTTkhachhang->TTTHoTenKhachHang = $request->TTTHoTenKhachHang;
        $TTTkhachhang->TTTEmail = $request->TTTEmail;
        $TTTkhachhang->TTTMatKhau = $request->TTTMatKhau;
        $TTTkhachhang->TTTDienThoai = $request->TTTDienThoai;
        $TTTkhachhang->TTTDiaChi = $request->TTTDiaChi;
        $TTTkhachhang->TTTNgayDangKy = $request->TTTNgayDangKy;
        $TTTkhachhang->TTTTrangThai = $request->TTTTrangThai;
    
        // Lưu khách hàng đã cập nhật
        $TTTkhachhang->save();
    
        // Chuyển hướng đến danh sách khách hàng
        return redirect()->route('TTTadmins.TTTkhachhang')->with('success', 'Cập nhật khách hàng thành công!');
    }
    
    //delete
    public function TTTDelete($id)
    {
        TTT_KHACH_HANG::where('id',$id)->delete();
        return back()->with('khachhang_deleted','Đã xóa Khách hàng thành công!');
    }

}
