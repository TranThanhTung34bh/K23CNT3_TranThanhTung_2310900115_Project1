@extends('layouts.admins._master')
@section('title','Sửa thông tin Loại Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('tttAdmins.LoaiSanPham.tttEdit') }}" method="POST">
                    @csrf
                    <input type="text" name="id" id="id" value="{{$LoaiSanPham->id}}">
                    <div class="card">
                        <div class="card-header">
                            <h2>Sửa thông tin Loại Sản Phẩm</h2>
                        </div>
                        <div class="card-body container-fluid">
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
                            <button class="btn btn-success">Edit</button>
                            <a href="{{ route('tttAdmins.LoaiSanPham') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
