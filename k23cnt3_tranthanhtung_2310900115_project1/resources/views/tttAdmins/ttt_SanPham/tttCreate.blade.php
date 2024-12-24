@extends('_layouts.admins._master')
@section('title','Create Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('tttadmin.tttsanpham.tttCreateSubmit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="tttMaSanPham" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="tttMaSanPham" name="tttMaSanPham" value="{{ old('tttMaSanPham') }}" >
                                @error('tttMaSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tttTenSanPham" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="tttTenSanPham" name="tttTenSanPham" value="{{ old('tttTenSanPham') }}" >
                                @error('tttTenSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="tttHinhAnh" class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" id="tttHinhAnh" name="tttHinhAnh" accept="image/*">
                                @error('tttHinhAnh')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="tttSoLuong" class="form-label">Số Lượng</label>
                                <input type="number" class="form-control" id="tttSoLuong" name="tttSoLuong" value="{{ old('tttSoLuong') }}" >
                                @error('tttSoLuong')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tttDonGia" class="form-label">Đơn Giá</label>
                                <input type="text" class="form-control" id="tttDonGia" name="tttDonGia" value="{{ old('tttDonGia') }}" >
                                @error('tttDonGia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tttMaLoai" class="form-label">Loại Danh Mục</label>
                                <select name="tttMaLoai" id="tttMaLoai" class="form-control">
                                    @foreach ($tttloaisanpham as $item)
                                        <option value="{{ $item->id }}">{{ $item->tttTenLoai }}</option>
                                    @endforeach
                                </select>
                                @error('tttMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="tttTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="tttTrangThai1" name="tttTrangThai" value="0" checked/>
                                    <label for="tttTrangThai1"> Hiển Thị</label>
                                    &nbsp;
                                    <input type="radio" id="tttTrangThai0" name="tttTrangThai" value="1"/>
                                    <label for="tttTrangThai0">Khóa</label>
                                </div>
                                @error('tttTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('tttadims.tttsanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
