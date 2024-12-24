<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\LoaiSanPham; // Sử dụng Model LoaiSanPham để thao tác với cơ sở dữ liệu
use App\Models\ttt_SAN_PHAM;
use Illuminate\Support\Facades\Storage;  // Use this for file handling

class TTT_SAN_PHAMController extends Controller
{
    // admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function tttList()
    {
        $tttsanphams = ttt_SAN_PHAM::where('tttTrangThai', 0)->get();
        return view('tttAdmins.tttsanpham.ttt-list', ['tttsanphams' => $tttsanphams]);
    } 

    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function tttDetail($id)
    {
        // Tìm sản phẩm theo ID
        $tttsanpham = TTT_SAN_PHAM::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('tttAdmins.tttsanpham.ttt-detail', ['tttsanpham' => $tttsanpham]);
    }

    // create  -----------------------------------------------------------------------------------------------------------------------------------------
    public function tttCreate()
    {
        // đọc dữ liệu từ LoaiSanPham
        $tttloaisanpham = LoaiSanPham::all();
        return view('tttAdmins.tttsanpham.ttt-create', ['tttloaisanpham' => $tttloaisanpham]);
    }

    // Controller
    public function tttCreateSubmit(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'tttMaSanPham' => 'required|unique:TTT_SAN_PHAM,tttMaSanPham',
            'tttTenSanPham' => 'required|string|max:255',
            'tttHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Kiểm tra hình ảnh và loại định dạng
            'tttSoLuong' => 'required|numeric|min:1',
            'tttDonGia' => 'required|numeric',
            'tttMaLoai' => 'required|exists:LoaiSanPham,id',
            'tttTrangThai' => 'required|in:0,1',
        ]);

        // Khởi tạo đối tượng TTT_SAN_PHAM và lưu thông tin vào cơ sở dữ liệu
        $tttsanpham = new TTT_SAN_PHAM;
        $tttsanpham->tttMaSanPham = $request->tttMaSanPham;
        $tttsanpham->tttTenSanPham = $request->tttTenSanPham;

        // Kiểm tra nếu có tệp hình ảnh
        if ($request->hasFile('tttHinhAnh')) {
            // Lấy tệp hình ảnh
            $file = $request->file('tttHinhAnh');

            // Kiểm tra nếu tệp hợp lệ
            if ($file->isValid()) {
                // Tạo tên tệp dựa trên mã sản phẩm
                $fileName = $request->tttMaSanPham . '.' . $file->extension();

                // Lưu tệp vào thư mục public/img/san_pham
                $file->storeAs('public/img/san_pham', $fileName); // Lưu tệp vào thư mục storage/app/public/img/san_pham

                // Lưu đường dẫn vào cơ sở dữ liệu
                $tttsanpham->tttHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
            }
        }

        // Lưu các thông tin còn lại vào cơ sở dữ liệu
        $tttsanpham->tttSoLuong = $request->tttSoLuong;
        $tttsanpham->tttDonGia = $request->tttDonGia;
        $tttsanpham->tttMaLoai = $request->tttMaLoai;
        $tttsanpham->tttTrangThai = $request->tttTrangThai;

        // Lưu dữ liệu vào cơ sở dữ liệu
        $tttsanpham->save();

        // Chuyển hướng người dùng về trang danh sách sản phẩm
        return redirect()->route('tttadims.tttsanpham');
    }

    // delete    -----------------------------------------------------------------------------------------------------------------------------------------
    public function tttDelete($id)
    {
        TTT_SAN_PHAM::where('id', $id)->delete();
        return back()->with('sanpham_deleted', 'Đã xóa sản phẩm thành công!');
    }

    // edit -----------------------------------------------------------------------------------------------------------------------------------------
    public function tttEdit($id)
    {
        // Tìm sản phẩm theo ID
        $tttsanpham = TTT_SAN_PHAM::findOrFail($id);

        // Lấy tất cả các loại sản phẩm từ bảng LoaiSanPham
        $tttloaisanpham = LoaiSanPham::all();

        // Trả về view với dữ liệu sản phẩm và loại sản phẩm
        return view('tttAdmins.tttsanpham.ttt-edit', [
            'tttsanpham' => $tttsanpham,
            'tttloaisanpham' => $tttloaisanpham
        ]);
    }

    // Phương thức xử lý dữ liệu form chỉnh sửa sản phẩm
    public function tttEditSubmit(Request $request, $id)
    {
        // Validate dữ liệu
        $request->validate([
            'tttMaSanPham' => 'required|max:20',
            'tttTenSanPham' => 'required|max:255',
            'tttHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tttSoLuong' => 'required|integer',
            'tttDonGia' => 'required|numeric',
            'tttMaLoai' => 'required|max:10',
            'tttTrangThai' => 'required|in:0,1',
        ]);

        // Tìm sản phẩm cần chỉnh sửa
        $tttsanpham = TTT_SAN_PHAM::findOrFail($id);

        // Cập nhật thông tin sản phẩm
        $tttsanpham->tttMaSanPham = $request->tttMaSanPham;
        $tttsanpham->tttTenSanPham = $request->tttTenSanPham;
        $tttsanpham->tttSoLuong = $request->tttSoLuong;
        $tttsanpham->tttDonGia = $request->tttDonGia;
        $tttsanpham->tttMaLoai = $request->tttMaLoai;
        $tttsanpham->tttTrangThai = $request->tttTrangThai;

        // Kiểm tra nếu có hình ảnh mới
        if ($request->hasFile('tttHinhAnh')) {
            // Kiểm tra và xóa hình ảnh cũ nếu tồn tại
            if ($tttsanpham->tttHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $tttsanpham->tttHinhAnh)) {
                // Xóa file cũ nếu tồn tại
                Storage::disk('public')->delete('img/san_pham/' . $tttsanpham->tttHinhAnh);
            }
            // Lưu hình ảnh mới
            $imagePath = $request->file('tttHinhAnh')->store('img/san_pham', 'public');
            $tttsanpham->tttHinhAnh = $imagePath;
        }

        // Lưu thông tin sản phẩm đã chỉnh sửa
        $tttsanpham->save();

        // Redirect về trang danh sách sản phẩm
        return redirect()->route('tttadims.tttsanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }
}
