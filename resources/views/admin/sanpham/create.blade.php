<!-- resources/views/sanpham/create.blade.php -->

@extends('admin.head')

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
            <input type="text" class="form-control" id="LoaiSanPham" name="LoaiSanPham" value="{{ old('LoaiSanPham') }}" required>
        </div>

        <div class="form-group">
            <label for="TenSanPham">Tên Sản Phẩm:</label>
            <input type="text" class="form-control" id="TenSanPham" name="TenSanPham" value="{{ old('TenSanPham') }}" required>
        </div>

        <div class="form-group">
            <label for="GiaSanPham">Giá Sản Phẩm:</label>
            <input type="number" class="form-control" id="GiaSanPham" name="GiaSanPham" value="{{ old('GiaSanPham') }}" required>
        </div>

        <div class="form-group">
            <label for="Anh">Ảnh:</label>
            <input type="text" class="form-control" id="Anh" name="Anh" value="{{ old('Anh') }}" required>
        </div>

        <div class="form-group">
            <label for="NgayNhap">Ngày Nhập:</label>
            <input type="date" class="form-control" id="NgayNhap" name="NgayNhap" value="{{ old('NgayNhap') }}" required>
        </div>

        <div class="form-group">
            <label for="TonKho">Tồn Kho:</label>
            <input type="number" class="form-control" id="TonKho" name="TonKho" value="{{ old('TonKho') }}" required>
        </div>

        <div class="form-group">
            <label for="MoTa">Mô Tả:</label>
            <input type="text" class="form-control" id="MoTa" name="MoTa" value="{{ old('MoTa') }}" required>
        </div>

        <div class="form-group">
            <label for="KhoHangId">Kho Hàng ID:</label>
            <input type="number" class="form-control" id="KhoHangId" name="KhoHangId" value="{{ old('KhoHangId') }}" required>
        </div>

        <!-- Thêm trường chọn Danh Mục -->
        <div class="form-group">
            <label for="DanhMucId">Danh Mục:</label>
            <select class="form-control" id="DanhMucId" name="DanhMucId" required>
                <option value="">Chọn Danh Mục</option>
                @foreach($danhmucs as $danhmuc)
                    <option value="{{ $danhmuc->id }}" {{ old('DanhMucId') == $danhmuc->id ? 'selected' : '' }}>
                        {{ $danhmuc->ten_danh_muc }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
    </form>
@endsection
