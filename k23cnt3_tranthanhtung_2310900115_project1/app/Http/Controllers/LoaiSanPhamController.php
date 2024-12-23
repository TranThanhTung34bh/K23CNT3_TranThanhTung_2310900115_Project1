<?php
namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    // Hiển thị danh sách loại sản phẩm
    public function index()
    {
        $loaiSanPhams = LoaiSanPham::all();
        return view('ttt_loai_san_pham.index', compact('loaiSanPhams'));
    }

    // Hiển thị form thêm mới
    public function tttCreate()
    {
        return view('ttt_loai_san_pham.create');
    }

    // Xử lý thêm mới
    public function tttCreateSubmit(Request $request)
    {
        $tttLoaiSanPham= new LoaiSanPham;
        $tttLoaiSanPham ->tttMaLoai= $request ->tttMaLoai;
        $tttLoaiSanPham ->tttTenLoai= $request ->tttTenLoai;
        $tttLoaiSanPham ->tttTrangThai= $request ->tttTrangThai;
        $tttLoaiSanPham ->saves();
        $validatedData = $request->validate([
            'ttt_ten_loai' => 'required|unique:ttt_loai_san_pham|max:255',
            'ttt_mo_ta' => 'nullable',
        ]);

        LoaiSanPham::create($validatedData);

        return redirect()->route('loai-san-pham.index')->with('success', 'Thêm mới thành công!');
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $loaiSanPham = LoaiSanPham::findOrFail($id);
        return view('ttt_loai_san_pham.edit', compact('loaiSanPham'));
    }

    // Xử lý cập nhật
    public function update(Request $request, $id)
    {
        $loaiSanPham = LoaiSanPham::findOrFail($id);

        $validatedData = $request->validate([
            'ttt_ten_loai' => 'required|unique:ttt_loai_san_pham,ttt_ten_loai,' . $id . ',ttt_id|max:255',
            'ttt_mo_ta' => 'nullable',
        ]);

        $loaiSanPham->update($validatedData);

        return redirect()->route('loai-san-pham.index')->with('success', 'Cập nhật thành công!');
    }

    // Xóa loại sản phẩm
    public function destroy($id)
    {
        $loaiSanPham = LoaiSanPham::findOrFail($id);
        $loaiSanPham->delete();

        return redirect()->route('loai-san-pham.index')->with('success', 'Xóa thành công!');
    }
}
