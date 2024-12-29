<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="container my-3">
    <div class="card">
        <div class="card-header">
            <h1>Danh sách loại sản phẩm</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã loại sản phẩm</th>
                        <th>Tên loại sản phẩm</th>
                        <th>Số lượng</th>
                        <th class="text-center">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $stt = 0;
                    @endphp
                    @foreach ($loaiSanPhams as $item)
                    @php
                    $stt++;
                    @endphp
                    <tr>
                        <th>{{$stt}}</th>
                        <td>{{$item->MaLSP}}</td>
                        <td>{{$item->TenLSP}}</td>
                        <td>{{$item->SoLuong}}</td>
                        <td class="text-center">
                            <a href="/ttt/loaisanpham/detail/{{$item->MaLSP}}"
                               class="btn btn-success">
                                Chi tiết
                            </a>
                            <a href="/ttt/loaisanpham/edit/{{$item->MaLSP}}"
                               class="btn btn-primary">
                                Sửa
                            </a>
                            <a href="/ttt/loaisanpham/Delete/{{$item->MaLSP}}"
                               class="btn btn-danger"
                               onclick="return confirm('Bạn muốn xóa không?');">
                                Xóa
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

</body>
</html>