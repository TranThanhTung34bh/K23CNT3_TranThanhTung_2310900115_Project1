<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TTT_SanPham; 
use App\Models\LoaiSanPham; // Sử dụng Model User để thao tác với cơ sở dữ liệu
use Illuminate\Support\Facades\Storage;  // Use this for file handling
class TTT_SanPhamController extends Controller
{
    public function tttIndex()
    {
        $TTT_SanPham = TTT_SanPham::all();
        return view('tttAdmins.ttt_SanPham.tttIndex', compact('ttt_SanPham'));
    }
    //
     //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function tttList()
    {
        $tttSanPhams = TTT_SanPham::where('tttTrangThai',0)->get();
        return view('tttAdmins.ttt_SanPham.TTT_list',['tttSanPhams'=>$tttSanPhams]);
    } 
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function tttDetail($id)
    {
        // Tìm sản phẩm theo ID
        $tttSanPham = TTT_SanPham::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('tttAdmins.tttSanPham.ttt-detail', ['tttSanPham' => $tttSanPham]);
    }
    public function tttGetDetail($id)
    {
        $TTT_SanPhams = TTT_SanPham::where('id', $id)->first();
        return view('tttAdmins.ttt_SanPham.tttDetail', ['SanPham' => $TTT_SanPhams]);
    }
    

      //create  -----------------------------------------------------------------------------------------------------------------------------------------
      public function tttCreate()
      {
            // đọc dữ liệu từ LoaiSanPham
            $tttsanpham = TTT_SanPham::all();
          return view('tttAdmins.ttt_SanPham.tttCreate',['tttSanPham'=>$tttsanpham]);
      }
     

     // Controller
public function tttCreateSubmit(Request $request)
{

    // Validate input
    $validatedData = $request->validate([
        'tttMaSanPham' => 'required|unique:ttt_san_pham,tttMaSanPham',
        'tttTenSanPham' => 'required|string|max:255',
        'tttHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Kiểm tra hình ảnh và loại định dạng
        'tttSoLuong' => 'required|numeric|min:1',
        'tttDonGia' => 'required|numeric',
        'tttMaLoai' => 'required|exists:ttt_loai_san_pham,id',
        'tttTrangThai' => 'required|in:0,1',
    ]);

    // Khởi tạo đối tượng TTT_SanPham và lưu thông tin vào cơ sở dữ liệu
    $tttSanPham = new TTT_SanPham;
    $tttSanPham->tttMaSanPham = $request->tttMaSanPham;
    $tttSanPham->tttTenSanPham = $request->tttTenSanPham;

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
            $tttSanPham->tttHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
        }
    }

    // Lưu các thông tin còn lại vào cơ sở dữ liệu
    $tttSanPham->tttSoLuong = $request->tttSoLuong;
    $tttSanPham->tttDonGia = $request->tttDonGia;
    $tttSanPham->tttMaLoai = $request->tttMaLoai;
    $tttSanPham->tttTrangThai = $request->tttTrangThai;

    // Lưu dữ liệu vào cơ sở dữ liệu
    $tttSanPham->save();

    // Chuyển hướng người dùng về trang danh sách sản phẩm
    return redirect()->route('tttAdmins.ttt_SanPham');
}

//delete    -----------------------------------------------------------------------------------------------------------------------------------------

public function tttdelete($id)
{
    TTT_SanPham::where('id',$id)->delete();
    return back()->with('sanpham_deleted','Đã xóa sinh viên thành công!');
}

// edit -----------------------------------------------------------------------------------------------------------------------------------------
public function tttEdit($id)
    {
       // Tìm sản phẩm theo ID
    $tttSanPham = TTT_SanPham::findOrFail($id);

    // Lấy tất cả các loại sản phẩm từ bảng LoaiSanPham
    $tttsanpham = TTT_SanPham::all();
    $tttloaisanpham = LoaiSanPham::all();
    // Trả về view với dữ liệu sản phẩm và loại sản phẩm
    return view('tttAdmins.ttt_SanPham.tttEdit', [
        'tttSanPham' => $tttSanPham,
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
    $tttSanPham = TTT_SanPham::findOrFail($id);

    // Cập nhật thông tin sản phẩm
    $tttSanPham->tttMaSanPham = $request->tttMaSanPham;
    $tttSanPham->tttTenSanPham = $request->tttTenSanPham;
    $tttSanPham->tttSoLuong = $request->tttSoLuong;
    $tttSanPham->tttDonGia = $request->tttDonGia;
    $tttSanPham->tttMaLoai = $request->tttMaLoai;
    $tttSanPham->tttTrangThai = $request->tttTrangThai;

    // Kiểm tra nếu có hình ảnh mới
    if ($request->hasFile('tttHinhAnh')) {
        // Kiểm tra và xóa hình ảnh cũ nếu tồn tại
        if ($tttSanPham->tttHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $tttSanPham->tttHinhAnh)) {
            // Xóa file cũ nếu tồn tại
            Storage::disk('public')->delete('img/san_pham/' . $tttSanPham->tttHinhAnh);
        }
        // Lưu hình ảnh mới
        $imagePath = $request->file('tttHinhAnh')->store('img/san_pham', 'public');
        $tttSanPham->tttHinhAnh = $imagePath;
    }

    // Lưu thông tin sản phẩm đã chỉnh sửa
    $tttSanPham->save();

    // Redirect về trang danh sách sản phẩm
    return redirect()->route('tttAdmins.ttt_SanPham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}


}