<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa Loại Sản Phẩm</title>
</head>
<body>
    <h1>Chỉnh sửa Loại Sản Phẩm</h1>
    <form action="{{ route('loai-san-pham.update', $loaiSanPham->ttt_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Tên Loại:</label>
            <input type="text" name="ttt_ten_loai" value="{{ $loaiSanPham->ttt_ten_loai }}" required>
        </div>
        <div>
            <label>Mô Tả:</label>
            <textarea name="ttt_mo_ta">{{ $loaiSanPham->ttt_mo_ta }}</textarea>
        </div>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
