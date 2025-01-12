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
            <h1>Danh sách sản phẩm</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th class="text-center">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $stt = 0;
                    @endphp
                    @foreach ($SanPhams as $item)
                    @php
                    $stt++;
                    @endphp
                    <tr>
                        <th>{{$stt}}</th>
                        <td>{{$item->MaSP}}</td>
                        <td>{{$item->TenSP}}</td>
                        <td>{{$item->SoLuong}}</td>
                        <td class="text-center">
                            <a href="/ttt/ttt_SanPham/Detail/{{$item->MaLSP}}"
                               class="btn btn-success">
                                Chi tiết
                            </a>
                            <a href="/ttt/ttt_SanPham/Edit/{{$item->MaLSP}}"
                               class="btn btn-primary">
                                Sửa
                            </a>
                            <a href="/ttt/ttt_SanPham/Delete/{{$item->MaLSP}}"
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