@extends('_layouts.admins_master')
@section('title','Danh sách loại sản phẩm')
@section('content-body')
    <div class="container border">
        <div class="row ">
            <div class="col-12">
                <h1>Danh sách sản phẩm</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>mã loại</th>
                    <th>tên loại</th>
                    <th>trạng thái</th>
                    <th>chức năng</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($LoaiSanPham as $item)
                    <tr>
                        <td class="=text-center">{{$loop->iteration}}</td>
                        <td>{{$item->tttMaLoai}}</td>
                        <td>{{$item->ttTenLoai}}</td>
                        <td>{{$item->tttTrangThai}}</td>
                        <td>
                            view/edit/delete
                        </td>
                $empty
                        <tr>
                            <th colspan="5">Chưa có thông tin sản phẩm </th>
                        </tr>
                $endforelse
                    </tr>
            </tbody>
        </table>
    </div>
@endsection