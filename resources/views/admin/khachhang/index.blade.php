<!-- resources/views/khachhang/index.blade.php -->
<link rel="stylesheet" href="{{ url('CSS/indexkhachhang.css') }}">
@extends('admin.layouts.app')

@section('title', 'Quản Lý Khách Hàng')

@section('content')

<div class="container"> <!-- Bắt đầu container -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('khachhang.store') }}" class="btn btn-primary mb-3">Add New KH</a>
    <hr>
    
    <h3>Danh sách Khách Hàng</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Khách Hàng</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($khachhangs as $khachhang)
                <tr>
                    <td>{{ $khachhang->id }}</td>
                    <td>{{ $khachhang->ten_khach_hang }}</td>
                    <td>{{ $khachhang->dia_chi }}</td>
                    <td>{{ $khachhang->so_dien_thoai }}</td>
                    <td>{{ $khachhang->email }}</td>
                    <td>
                        <a href="{{ route('khachhang.edit', $khachhang->id) }}" class="btn btn-primary">Sửa</a>
                        <form action="{{ route('khachhang.destroy', $khachhang->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?');" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- Kết thúc container -->

@endsection
