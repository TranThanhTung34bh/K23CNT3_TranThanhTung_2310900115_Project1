@extends('layouts.admins._master')

@section('title', 'Danh Sách Sản Phẩm')

@section('content-body')
    <div class="container border mt-4">
        <!-- Tiêu đề và nút Thêm Mới -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Danh Sách Sản Phẩm</h1>
                <a href="{{ route('tttAdmins.ttt_SanPham.tttCreate') }}" class="btn btn-success btn-lg">
                    <i class="fa-solid fa-plus-circle"></i> Thêm Mới
                </a>
            </div>
        </div>
        
        <!-- Bảng dữ liệu -->
        <div class="row">
            <table class="table table-striped table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Mã Loại</th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $stt = 0; @endphp
                    @forelse ($tttSanPhams as $item)
                        @php $stt++; @endphp
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $item->tttMaSanPham }}</td>
                            <td>{{ $item->tttTenSanPham }}</td>
                            <td>
                                <img src="{{ $item->tttHinhAnh ?? 'default-image.png' }}" alt="{{ $item->tttTenSanPham }}" width="50">
                            </td>
                            <td>{{ $item->tttSoLuong }}</td>
                            <td>{{ number_format($item->tttDonGia, 0, ',', '.') }} VND</td>
                            <td>{{ $item->tttMaLoai }}</td>
                            <td>
                                @if ($item->tttTrangThai == 0)
                                    <span class="badge bg-success">Hiển Thị</span>
                                @else
                                    <span class="badge bg-danger">Khóa</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <!-- Các nút chức năng -->
                                <div class="btn-group" role="group">
                                    <!-- Xem chi tiết -->
                                    <a href="{{ url('/tttAdmins/ttt_SanPham/tttDetail/' . $item->id) }}" 
                                       class="btn btn-success btn-sm" title="Xem">
                                       <i class="fa-solid fa-eye"> Xem</i>
                                    </a>
                                    <!-- Chỉnh sửa -->
                                    <a href="{{ url('/tttAdmins/ttt_SanPham/tttEdit/' . $item->id) }}" 
                                       class="btn btn-primary btn-sm" title="Chỉnh sửa">
                                       <i class="fa-solid fa-pen"> Sửa</i>
                                    </a>
                                    <!-- Xóa -->
                                    <a href="{{ url('/tttAdmins/ttt_SanPham/tttDelete/' . $item->id) }}" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bạn muốn xóa Mã Sản Phẩm này không? ID: {{ $item->id }}');" 
                                       title="Xóa">
                                       <i class="fa-regular fa-trash-can"> Xóa</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">
                                Chưa có thông tin sản phẩm
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
