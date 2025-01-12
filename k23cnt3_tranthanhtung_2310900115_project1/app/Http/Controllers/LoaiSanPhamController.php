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
        $LoaiSanPhams = LoaiSanPham::all();
        return view('tttAdmins.LoaiSanPham.TTT_list', ['LoaiSanPham' => $LoaiSanPhams]);
    }

    //create
    public function tttCreate()
    {
        return view('tttAdmins.LoaiSanPham.tttCreate');
    }

    public function tttCreateSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'tttMaLoai' => 'required|unique:ttt_loai_san_pham,tttMaLoai',  // Kiểm tra mã loại không trống và duy nhất
            'tttTenLoai' => 'required|string|max:255',  // Kiểm tra tên loại không trống và là chuỗi
            'tttTrangThai' => 'required|in:0,1',  // Trạng thái phải là 0 hoặc 1
        ]);
        
        //ghi dữ liệu xuống db
        $LoaiSanPham = new LoaiSanPham;
        $LoaiSanPham->tttMaLoai = $request->tttMaLoai;
        $LoaiSanPham->tttTenLoai = $request->tttTenLoai;
        $LoaiSanPham->tttTrangThai = $request->tttTrangThai;

        $LoaiSanPham->save();
        return redirect()->route('tttAdmins.LoaiSanPham');
    }

    public function tttEdit($id)
    {
        // Retrieve the product by the prminary key (id)
        $LoaiSanPham = LoaiSanPham::find($id);
    
        // Pass the product data to the edit view
        return view('tttAdmins.LoaiSanPham.tttEdit', ['LoaiSanPham' => $LoaiSanPham]);
    }
    public function Index()
        {
            // Logic lấy danh sách sản phẩm
            return view('tttAdmins.LoaiSanPham.tttIndex');
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
        $LoaiSanPham = LoaiSanPham::find($request->id);
    
        // Check if the product exists
        if (!$LoaiSanPham) {
            return redirect()->route('tttAdmins.LoaiSanPham.tttEdit')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Update the product with validated data
        $LoaiSanPham->tttMaLoai = $request->tttMaLoai;
        $LoaiSanPham->tttTenLoai = $request->tttTenLoai;
        $LoaiSanPham->tttTrangThai = $request->tttTrangThai;
    
        // Save the updated product
        $LoaiSanPham->save();
    
        // Redirect back to the list page with a success message
        return redirect()->route('tttAdmins.LoaiSanPham.tttEdit ')->with('success', 'Cập nhật loại sản phẩm thành công.');
    }

        
    public function tttGetDetail($id)
    {
        $LoaiSanPham = LoaiSanPham::where('id', $id)->first();
        return view('tttAdmins.LoaiSanPham.tttDetail', ['LoaiSanPham' => $LoaiSanPham]);
    }

    public function tttDelete($id)
    {
        LoaiSanPham::where('id', $id)->Delete();
        return back()->with('LoaiSanPham_Deleted', 'Đã xóa loại sản phẩm thành công!');
    }
}
