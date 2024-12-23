<!DOCTYPE html>
<html>
<head>
    <title>Thêm mới Loại Sản Phẩm</title>
</head>
<body>
    <h1>Thêm mới Loại Sản Phẩm</h1>
    <form action="{{ route('loai-san-pham.store') }}" method="POST">
        @csrf
        <div>
            <label>Tên Loại:</label>
            <input type="text" name="ttt_ten_loai" value="{{ old('ttt_ten_loai') }}" required>
        </div>
        <div>
            <label>Mô Tả:</label>
            <textarea name="ttt_mo_ta">{{ old('ttt_mo_ta') }}</textarea>
        </div>
        <button type="submit">Thêm mới</button>
    </form>
</body>
</html>
