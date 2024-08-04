<!-- resources/views/sanpham/index.blade.php -->
<link rel="stylesheet" href="{{ url('CSS/viewsp.css') }}">
<!-- Thêm thư viện hover.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">

@extends('admin.head')

@section('title', 'Quản Lý Sản Phẩm')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('sanpham.store') }}" class="btn btn-primary1 mb-3">Add New SP</a>
    <hr>

    <h2 class="mt-4">Danh Sách Sản Phẩm</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Loại Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá Sản Phẩm</th>
                <th>Ảnh</th>
                <th>Ngày Nhập</th>
                <th>Tồn Kho</th>
                <th>Mô Tả</th>
                <th>Kho Hàng ID</th>
                <th>Danh Mục</th> <!-- Thêm cột Danh Mục -->
                <th>Hành Động</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($sanphams as $sanpham)
            <tr>
                <td>{{ $sanpham->SanPhamId }}</td>
                <td>{{ $sanpham->LoaiSanPham }}</td>
                <td>{{ $sanpham->TenSanPham }}</td>
                <td>{{ number_format($sanpham->GiaSanPham, 0, ',', '.') }}</td>
                <td><img src="{{ $sanpham->Anh }}" alt="{{ $sanpham->TenSanPham }}" width="50"></td>
                <td>{{ $sanpham->NgayNhap }}</td>
                <td>{{ $sanpham->TonKho }}</td>
                <td>{{ $sanpham->MoTa }}</td>
                <td>{{ $sanpham->KhoHangId }}</td>
                <td>{{ $sanpham->danhmuc->ten_danh_muc ?? 'Không xác định' }}</td> <!-- Hiển thị tên danh mục -->
                <td>
                    <a href="{{ route('sanpham.edit', $sanpham->SanPhamId) }}" class="btn btn-primary btn-sm">Sửa</a>
                    <form action="{{ route('sanpham.destroy', $sanpham->SanPhamId) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
