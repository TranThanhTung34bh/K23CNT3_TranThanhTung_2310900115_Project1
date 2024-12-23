<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Loại Sản Phẩm</title>
</head>
<body>
    <h1>Danh sách Loại Sản Phẩm</h1>
    <a href="{{ route('loai-san-pham.create') }}">Thêm mới</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Loại</th>
                <th>Mô Tả</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loaiSanPhams as $loaiSanPham)
                <tr>
                    <td>{{ $loaiSanPham->ttt_id }}</td>
                    <td>{{ $loaiSanPham->ttt_ten_loai }}</td>
                    <td>{{ $loaiSanPham->ttt_mo_ta }}</td>
                    <td>
                        <a href="{{ route('loai-san-pham.edit', $loaiSanPham->ttt_id) }}">Sửa</a>
                        <form action="{{ route('loai-san-pham.destroy', $loaiSanPham->ttt_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
