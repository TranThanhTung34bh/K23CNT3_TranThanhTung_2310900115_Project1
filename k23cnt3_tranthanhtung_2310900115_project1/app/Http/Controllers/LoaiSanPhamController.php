<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham; // Sử dụng Model LoaiSanPham để thao tác với cơ sở dữ liệu

class LoaiSanPhamController extends Controller
{
    //admin CRUD
    // list
    public function tttList()
    {
        $tttloaisanphams = LoaiSanPham::all();
        return view('tttAdmins.LoaiSanPham.TTT_list', ['LoaiSanPham' => $tttloaisanphams]);
    }

    //create
    public function tttCreate()
    {
        return view('tttAdmins.LoaiSanPham.ttt-create');
    }

    public function tttCreateSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'tttMaLoai' => 'required|unique:LoaiSanPham,tttMaLoai',  // Kiểm tra mã loại không trống và duy nhất
            'tttTenLoai' => 'required|string|max:255',  // Kiểm tra tên loại không trống và là chuỗi
            'tttTrangThai' => 'required|in:0,1',  // Trạng thái phải là 0 hoặc 1
        ]);
        
        //ghi dữ liệu xuống db
        $tttloaisanpham = new LoaiSanPham;
        $tttloaisanpham->tttMaLoai = $request->tttMaLoai;
        $tttloaisanpham->tttTenLoai = $request->tttTenLoai;
        $tttloaisanpham->tttTrangThai = $request->tttTrangThai;

        $tttloaisanpham->save();
        return redirect()->route('tttadims.LoaiSanPham');
    }

    public function tttEdit($id)
    {
        // Retrieve the product by the primary key (id)
        $tttloaisanpham = LoaiSanPham::find($id);
    
        // If the product does not exist, redirect with an error message
        if (!$tttloaisanpham) {
            return redirect()->route('tttadims.LoaiSanPham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Pass the product data to the edit view
        return view('tttAdmins.LoaiSanPham.ttt-edit', ['LoaiSanPham' => $tttloaisanpham]);
    }

    public function tttEditSubmit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'tttMaLoai' => 'required|string|max:255|unique:LoaiSanPham,tttMaLoai,' . $request->id,  // Bỏ qua tttMaLoai của bản ghi hiện tại
            'tttTenLoai' => 'required|string|max:255',   
            'tttTrangThai' => 'required|in:0,1',  // Validation for tttTrangThai (0 or 1)
        ]);
    
        // Find the product by id
        $tttloaisanpham = LoaiSanPham::find($request->id);
    
        // Check if the product exists
        if (!$tttloaisanpham) {
            return redirect()->route('tttadims.LoaiSanPham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Update the product with validated data
        $tttloaisanpham->tttMaLoai = $request->tttMaLoai;
        $tttloaisanpham->tttTenLoai = $request->tttTenLoai;
        $tttloaisanpham->tttTrangThai = $request->tttTrangThai;
    
        // Save the updated product
        $tttloaisanpham->save();
    
        // Redirect back to the list page with a success message
        return redirect()->route('tttadims.LoaiSanPham')->with('success', 'Cập nhật loại sản phẩm thành công.');
    }

    public function tttGetDetail($id)
    {
        $tttloaisanpham = LoaiSanPham::where('id', $id)->first();
        return view('tttAdmins.LoaiSanPham.ttt-detail', ['LoaiSanPham' => $tttloaisanpham]);
    }

    public function tttDelete($id)
    {
        LoaiSanPham::where('id', $id)->delete();
        return back()->with('loaisanpham_deleted', 'Đã xóa loại sản phẩm thành công!');
    }
}
