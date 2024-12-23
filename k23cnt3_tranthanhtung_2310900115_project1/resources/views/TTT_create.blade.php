<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin chi tiết Loại sản phẩm</title>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="card">
    <div class="card-header">
        <h2>Thêm mới loại sản phẩm</h2>
    </div>

    <form>
        <div class="card-body container-fluid">
            <div class="mb-3 row">
                <label for="tttMaLoai" class="col-sm-2 col-form-label">Mã loại</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tttMaLoai" name="tttMaLoai" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tttTenLoai" class="col-sm-2 col-form-label">Tên loại</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tttTenLoai" name="tttTenLoai" />
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Trạng thái</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="tttTrangThai1" name="tttTrangThai" value="1" />
                        <label for="tttTrangThai1" class="form-check-label">Hiển thị</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="tttTrangThai0" name="tttTrangThai" value="0" />
                        <label for="tttTrangThai0" class="form-check-label">Khóa</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">Ghi lại</button>
            <a href="{{route('tttadmins.tttloaisanpham')}}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
</body>
</html>

