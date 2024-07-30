<!-- resources/views/khachhang/edit.blade.php -->
 
<link rel="stylesheet" href="{{ asset('resources/cs s/indexkhachhang.css') }}">
@extends('layouts.app')

@section('title', 'Sửa Thông Tin Khách Hàng')

@section('content')
    <h2 class="my-4">Sửa Thông Tin Khách Hàng</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('khachhang.update', $khachhang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ten_khach_hang">Tên Khách Hàng:</label>
            <input type="text" class="form-control" id="ten_khach_hang" name="ten_khach_hang" value="{{ $khachhang->ten_khach_hang }}" required>
        </div>
        <div class="form-group">
            <label for="dia_chi">Địa Chỉ:</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ $khachhang->dia_chi }}">
        </div>
        <div class="form-group">
            <label for="so_dien_thoai">Số Điện Thoại:</label>
            <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="{{ $khachhang->so_dien_thoai }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $khachhang->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
        <a href="{{ route('khachhang.index') }}" class="btn btn-secondary">Quay Lại</a>
    </form>
@endsection
