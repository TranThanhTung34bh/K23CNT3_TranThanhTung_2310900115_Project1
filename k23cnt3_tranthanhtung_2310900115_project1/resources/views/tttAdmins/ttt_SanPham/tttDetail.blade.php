@extends('layouts.admins._master')
@section('title','Xem Thông Tin  Sản Phẩm  ')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h1>Chi Tiết Sản Phẩm  </h1>
                    </div>
                    <div class="card-body">

                        <p class="card-text">
                            <b>Mã Sản Phẩm :</b>
                            {{$SanPham->tttMaSanPham}}
                        </p>
                        <p class="card-text">
                            <b>Tên Sản Phẩm :</b>
                            {{$SanPham->tttTenSanPham}}
                        </p>
                        <p class="card-text">
                            <b>Trạng Thái:</b>
                            {{$SanPham->tttTrangThai == 0 ? 'Hiển Thị' : 'Khóa'}}
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('tttAdmins.ttt_SanPham')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection