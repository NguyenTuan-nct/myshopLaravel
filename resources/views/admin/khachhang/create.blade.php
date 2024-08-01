<!-- resources/views/khachhang/create.blade.php -->

@extends('admin.layouts.app')

@section('title', 'Thêm Khách Hàng')

@section('content')
    <h2 class="my-4">Thêm Khách Hàng</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('khachhang.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ten_khach_hang">Tên Khách Hàng:</label>
            <input type="text" class="form-control" id="ten_khach_hang" name="ten_khach_hang" required>
        </div>
        <div class="form-group">
            <label for="dia_chi">Địa Chỉ:</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi">
        </div>
        <div class="form-group">
            <label for="so_dien_thoai">Số Điện Thoại:</label>
            <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Thêm Khách Hàng</button>
        <a href="{{ route('khachhang.index') }}" class="btn btn-secondary">Quay Lại</a>
    </form>
@endsection
