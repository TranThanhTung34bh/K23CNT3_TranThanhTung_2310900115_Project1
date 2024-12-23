<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteLoaiSanPhamController extends Controller
{
    public function destroy($id)
    {
        $loaiSanPham = LoaiSanPham::findOrFail($id);

        // Xóa hình ảnh nếu tồn tại
        if ($loaiSanPham->ttt_hinh_anh) {
            Storage::disk('public')->delete($loaiSanPham->ttt_hinh_anh);
        }

        // Xóa bản ghi khỏi cơ sở dữ liệu
        $loaiSanPham->delete();

        return redirect()->route('loai-san-pham.index')->with('success', 'Xóa loại sản phẩm thành công!');
    }
}
