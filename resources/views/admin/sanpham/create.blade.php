<!-- resources/views/sanpham/create.blade.php -->

@extends('admin.layouts.app')

@section('title', 'Thêm Sản Phẩm')

@section('content')
    <h1 class="mb-4">Thêm Sản Phẩm</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sanpham.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="LoaiSanPham">Loại Sản Phẩm:</label>
            <input type="text" class="form-control" id="LoaiSanPham" name="LoaiSanPham" value="{{ old('LoaiSanPham') }}">
        </div>
        <div class="form-group">
            <label for="TenSanPham">Tên Sản Phẩm:</label>
            <input type="text" class="form-control" id="TenSanPham" name="TenSanPham" value="{{ old('TenSanPham') }}">
        </div>
        <div class="form-group">
            <label for="GiaSanPham">Giá Sản Phẩm:</label>
            <input type="number" class="form-control" id="GiaSanPham" name="GiaSanPham" value="{{ old('GiaSanPham') }}">
        </div>
        <div class="form-group">
            <label for="Anh">Ảnh:</label>
            <input type="text" class="form-control" id="Anh" name="Anh" value="{{ old('Anh') }}">
        </div>
        <div class="form-group">
            <label for="NgayNhap">Ngày Nhập:</label>
            <input type="date" class="form-control" id="NgayNhap" name="NgayNhap" value="{{ old('NgayNhap') }}">
        </div>
        <div class="form-group">
            <label for="TonKho">Tồn Kho:</label>
            <input type="number" class="form-control" id="TonKho" name="TonKho" value="{{ old('TonKho') }}">
        </div>
        <div class="form-group">
            <label for="MoTa">Mô Tả:</label>
            <input type="text" class="form-control" id="MoTa" name="MoTa" value="{{ old('MoTa') }}">
        </div>
        <div class="form-group">
            <label for="KhoHangId">Kho Hàng ID:</label>
            <input type="number" class="form-control" id="KhoHangId" name="KhoHangId" value="{{ old('KhoHangId') }}">
        </div>
        <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
    </form>
@endsection
