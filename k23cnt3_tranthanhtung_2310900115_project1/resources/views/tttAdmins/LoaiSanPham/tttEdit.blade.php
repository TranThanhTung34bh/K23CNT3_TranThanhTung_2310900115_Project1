@extends('_layouts.admins._master')
@section('title','Sửa Loại Sản Phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the tttMaLoai as a parameter -->
                <form action="{{ route('tttadmin.tttloaisanpham.tttEditSubmit') }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $tttloaisanpham->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="tttMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="tttMaLoai" name="tttMaLoai" value="{{ $tttloaisanpham->tttMaLoai }}" >
                                @error('tttMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="tttTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="tttTenLoai" name="tttTenLoai" value="{{ old('tttTenLoai', $tttloaisanpham->tttTenLoai) }}" >
                                @error('tttTenLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="tttTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="tttTrangThai1" name="tttTrangThai" value="1" {{ old('tttTrangThai', $tttloaisanpham->tttTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="tttTrangThai1">Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="tttTrangThai0" name="tttTrangThai" value="0" {{ old('tttTrangThai', $tttloaisanpham->tttTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="tttTrangThai0">Hiển Thị</label>
                                </div>
                                @error('tttTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('tttadims.tttloaisanpham') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
