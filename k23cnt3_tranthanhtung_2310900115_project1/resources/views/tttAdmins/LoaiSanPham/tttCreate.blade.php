@extends('layouts.admins._master')
@section('title','Create Loại Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('tttadmins.LoaiSanPham.tttCreateSubmit') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="tttMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="tttMaLoai" name="tttMaLoai" value="{{ old('tttMaLoai') }}">
                                @error('tttMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tttTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="tttTenLoai" name="tttTenLoai" value="{{ old('tttTenLoai') }}">
                                @error('tttTenLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tttTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="tttTrangThai" name="tttTrangThai" value="0" checked/>
                                    <label for="tttTrangThai"> Hiển Thị</label>
                                    &nbsp;
                                    <input type="radio" id="tttTrangThai" name="tttTrangThai" value="1"/>
                                    <label for="tttTrangThai">Khóa</label>
                                </div>
                                @error('tttTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{ route('tttadmins.LoaiSanPham.tttIndex') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
