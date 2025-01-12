@extends('layouts.admins._master')

@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Sản Phẩm</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa sản phẩm -->
                    <form action="{{ route('tttAdmins.ttt_SanPham.tttEditSubmit', $tttSanPham->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Mã sản phẩm -->
                        <div class="mb-3">
                            <label for="tttMaSanPham" class="form-label">Mã sản phẩm</label>
                            <input type="text" name="tttMaSanPham" class="form-control" value="{{ old('tttMaSanPham', $tttSanPham->tttMaSanPham) }}">
                            @error('tttMaSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="tttTenSanPham" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="tttTenSanPham" class="form-control" value="{{ old('tttTenSanPham', $tttSanPham->tttTenSanPham) }}">
                            @error('tttTenSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh sản phẩm -->
                        <div class="mb-3">
                            <label for="tttHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="tttHinhAnh" class="form-control">
                            @if($tttSanPham->tttHinhAnh)
                                <img src="{{ asset('storage/' . $tttSanPham->tttHinhAnh) }}" alt="Sản phẩm {{ $tttSanPham->tttMaSanPham }}" width="200" class="mt-2">
                            @endif
                            @error('tttHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="tttSoLuong" class="form-label">Số lượng</label>
                            <input type="number" name="tttSoLuong" class="form-control" value="{{ old('tttSoLuong', $tttSanPham->tttSoLuong) }}">
                            @error('tttSoLuong')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Đơn giá -->
                        <div class="mb-3">
                            <label for="tttDonGia" class="form-label">Đơn giá</label>
                            <input type="number" name="tttDonGia" class="form-control" value="{{ old('tttDonGia', $tttSanPham->tttDonGia) }}">
                            @error('tttDonGia')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mã Loại -->
                        <div class="mb-3">
                            <label for="tttMaLoai" class="form-label">Loại Danh Muc</label>
                            <select name="tttMaLoai" id="tttMaLoai" class="form-control">
                                @foreach ($tttloaisanpham as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('tttMaLoai', $tttSanPham->tttMaLoai) == $item->id ? 'selected' : '' }}>
                                        {{ $item->tttTenLoai }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tttMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="tttTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="tttTrangThai1" name="tttTrangThai" value="1" {{ old('tttTrangThai', $tttSanPham->tttTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="tttTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="tttTrangThai0" name="tttTrangThai" value="0" {{ old('tttTrangThai', $tttSanPham->tttTrangThai) == 0 ? 'checked' : '' }} />
                                <label for="tttTrangThai0">Hiển Thị</label>
                            </div>
                            @error('tttTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nút lưu -->
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- Nút quay lại danh sách sản phẩm -->
                    <a href="{{ route('tttAdmins.ttt_SanPham') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection