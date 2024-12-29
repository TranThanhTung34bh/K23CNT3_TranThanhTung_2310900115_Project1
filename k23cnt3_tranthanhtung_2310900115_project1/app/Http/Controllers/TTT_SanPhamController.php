<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TTT_SAN_PHAM; 
use App\Models\LoaiSanPham; // Sử dụng Model User để thao tác với cơ sở dữ liệu
use Illuminate\Support\Facades\Storage;  // Use this for file handling
class TTT_SAN_PHAMController extends Controller
{
    //


     //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function TTTList()
    {
        $TTTsanphams = TTT_SAN_PHAM::where('TTTTrangThai',0)->get();
        return view('TTTAdmins.TTTsanpham.TTT-list',['TTTsanphams'=>$TTTsanphams]);
    } 
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function TTTDetail($id)
    {
        // Tìm sản phẩm theo ID
        $TTTsanpham = TTT_SAN_PHAM::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('TTTAdmins.TTTsanpham.TTT-detail', ['TTTsanpham' => $TTTsanpham]);
    }

      //create  -----------------------------------------------------------------------------------------------------------------------------------------
      public function TTTCreate()
      {
            // đọc dữ liệu từ LoaiSanPham
            $TTTloaisanpham = LoaiSanPham::all();
          return view('TTTAdmins.TTTsanpham.TTT-create',['TTTloaisanpham'=>$TTTloaisanpham]);
      }
     

     // Controller
public function TTTCreateSubmit(Request $request)
{

    // Validate input
    $validatedData = $request->validate([
        'TTTMaSanPham' => 'required|unique:TTT_SAN_PHAM,TTTMaSanPham',
        'TTTTenSanPham' => 'required|string|max:255',
        'TTTHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Kiểm tra hình ảnh và loại định dạng
        'TTTSoLuong' => 'required|numeric|min:1',
        'TTTDonGia' => 'required|numeric',
        'TTTMaLoai' => 'required|exists:LoaiSanPham,id',
        'TTTTrangThai' => 'required|in:0,1',
    ]);

    // Khởi tạo đối tượng TTT_SAN_PHAM và lưu thông tin vào cơ sở dữ liệu
    $TTTsanpham = new TTT_SAN_PHAM;
    $TTTsanpham->TTTMaSanPham = $request->TTTMaSanPham;
    $TTTsanpham->TTTTenSanPham = $request->TTTTenSanPham;

    // Kiểm tra nếu có tệp hình ảnh
    if ($request->hasFile('TTTHinhAnh')) {
        // Lấy tệp hình ảnh
        $file = $request->file('TTTHinhAnh');

        // Kiểm tra nếu tệp hợp lệ
        if ($file->isValid()) {
            // Tạo tên tệp dựa trên mã sản phẩm
            $fileName = $request->TTTMaSanPham . '.' . $file->extension();

            // Lưu tệp vào thư mục public/img/san_pham
            $file->storeAs('public/img/san_pham', $fileName); // Lưu tệp vào thư mục storage/app/public/img/san_pham

            // Lưu đường dẫn vào cơ sở dữ liệu
            $TTTsanpham->TTTHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
        }
    }

    // Lưu các thông tin còn lại vào cơ sở dữ liệu
    $TTTsanpham->TTTSoLuong = $request->TTTSoLuong;
    $TTTsanpham->TTTDonGia = $request->TTTDonGia;
    $TTTsanpham->TTTMaLoai = $request->TTTMaLoai;
    $TTTsanpham->TTTTrangThai = $request->TTTTrangThai;

    // Lưu dữ liệu vào cơ sở dữ liệu
    $TTTsanpham->save();

    // Chuyển hướng người dùng về trang danh sách sản phẩm
    return redirect()->route('TTTadims.TTTsanpham');
}

//delete    -----------------------------------------------------------------------------------------------------------------------------------------

public function TTTdelete($id)
{
    TTT_SAN_PHAM::where('id',$id)->delete();
return back()->with('sanpham_deleted','Đã xóa Sản Phẩm thành công!');
}

// edit -----------------------------------------------------------------------------------------------------------------------------------------
public function TTTEdit($id)
    {
       // Tìm sản phẩm theo ID
    $TTTsanpham = TTT_SAN_PHAM::findOrFail($id);

    // Lấy tất cả các loại sản phẩm từ bảng LoaiSanPham
    $TTTloaisanpham = LoaiSanPham::all();

    // Trả về view với dữ liệu sản phẩm và loại sản phẩm
    return view('TTTAdmins.TTTsanpham.TTT-edit', [
        'TTTsanpham' => $TTTsanpham,
        'TTTloaisanpham' => $TTTloaisanpham
    ]);
    }

    // Phương thức xử lý dữ liệu form chỉnh sửa sản phẩm


    public function TTTEditSubmit(Request $request, $id)
{
    // Validate dữ liệu
    $request->validate([
        'TTTMaSanPham' => 'required|max:20',
        'TTTTenSanPham' => 'required|max:255',
        'TTTHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'TTTSoLuong' => 'required|integer',
        'TTTDonGia' => 'required|numeric',
        'TTTMaLoai' => 'required|max:10',
        'TTTTrangThai' => 'required|in:0,1',
    ]);

    // Tìm sản phẩm cần chỉnh sửa
    $TTTsanpham = TTT_SAN_PHAM::findOrFail($id);

    // Cập nhật thông tin sản phẩm
    $TTTsanpham->TTTMaSanPham = $request->TTTMaSanPham;
    $TTTsanpham->TTTTenSanPham = $request->TTTTenSanPham;
    $TTTsanpham->TTTSoLuong = $request->TTTSoLuong;
    $TTTsanpham->TTTDonGia = $request->TTTDonGia;
    $TTTsanpham->TTTMaLoai = $request->TTTMaLoai;
    $TTTsanpham->TTTTrangThai = $request->TTTTrangThai;

    // Kiểm tra nếu có hình ảnh mới
    if ($request->hasFile('TTTHinhAnh')) {
        // Kiểm tra và xóa hình ảnh cũ nếu tồn tại
        if ($TTTsanpham->TTTHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $TTTsanpham->TTTHinhAnh)) {
            // Xóa file cũ nếu tồn tại
            Storage::disk('public')->delete('img/san_pham/' . $TTTsanpham->TTTHinhAnh);
        }
        // Lưu hình ảnh mới
        $imagePath = $request->file('TTTHinhAnh')->store('img/san_pham', 'public');
        $TTTsanpham->TTTHinhAnh = $imagePath;
    }

    // Lưu thông tin sản phẩm đã chỉnh sửa
    $TTTsanpham->save();

    // Redirect về trang danh sách sản phẩm
    return redirect()->route('TTTadims.TTTsanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}

    

}
