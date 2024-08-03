<!-- resources/views/sanpham/edit.blade.php -->

@extends('admin.layouts.app')

@section('title', 'Sửa Sản Phẩm')

@section('content')
    <h1 class="mb-4">Sửa Sản Phẩm</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sanpham.update', $sanpham->SanPhamId) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="LoaiSanPham">Loại Sản Phẩm:</label>
            <input type="text" class="form-control" id="LoaiSanPham" name="LoaiSanPham" value="{{ old('LoaiSanPham', $sanpham->LoaiSanPham) }}">
        </div>

        <div class="form-group">
            <label for="TenSanPham">Tên Sản Phẩm:</label>
            <input type="text" class="form-control" id="TenSanPham" name="TenSanPham" value="{{ old('TenSanPham', $sanpham->TenSanPham) }}">
        </div>

        <div class="form-group">
            <label for="GiaSanPham">Giá Sản Phẩm:</label>
            <input type="number" class="form-control" id="GiaSanPham" name="GiaSanPham" value="{{ old('GiaSanPham', $sanpham->GiaSanPham) }}">
        </div>

        <div class="form-group">
            <label for="Anh">Ảnh:</label>
            <input type="text" class="form-control" id="Anh" name="Anh" value="{{ old('Anh', $sanpham->Anh) }}">
        </div>

        <div class="form-group">
            <label for="NgayNhap">Ngày Nhập:</label>
            <input type="date" class="form-control" id="NgayNhap" name="NgayNhap" value="{{ old('NgayNhap', $sanpham->NgayNhap) }}">
        </div>

        <div class="form-group">
            <label for="TonKho">Tồn Kho:</label>
            <input type="number" class="form-control" id="TonKho" name="TonKho" value="{{ old('TonKho', $sanpham->TonKho) }}">
        </div>

        <div class="form-group">
            <label for="MoTa">Mô Tả:</label>
            <input type="text" class="form-control" id="MoTa" name="MoTa" value="{{ old('MoTa', $sanpham->MoTa) }}">
        </div>

        <div class="form-group">
            <label for="KhoHangId">Kho Hàng ID:</label>
            <input type="number" class="form-control" id="KhoHangId" name="KhoHangId" value="{{ old('KhoHangId', $sanpham->KhoHangId) }}">
        </div>

        <!-- Thêm trường chọn Danh Mục -->
        <div class="form-group">
            <label for="DanhMucId">Danh Mục:</label>
            <select class="form-control" id="DanhMucId" name="DanhMucId">
                @foreach($danhmucs as $danhmuc)
                    <option value="{{ $danhmuc->id }}" {{ $sanpham->DanhMucId == $danhmuc->id ? 'selected' : '' }}>
                        {{ $danhmuc->ten_danh_muc }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
    </form>
@endsection
