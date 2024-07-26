<!-- resources/views/khachhang/index.blade.php -->
<link rel="stylesheet" href="{{ asset('resources/css/indexkhachhang.css') }}">
@extends('layouts.app')

@section('title', 'Quản Lý Khách Hàng')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/addkh') }}" class="btn btn-success mb-3">Thêm Khách Hàng</a>
    
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
@endsection
