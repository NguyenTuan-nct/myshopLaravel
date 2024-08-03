<link rel="stylesheet" href="{{ url('CSS/invoice.css') }}">
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Chỉnh Sửa Chi Tiết Hóa Đơn - Hóa Đơn {{ $invoice->id }}</h1>
    <form action="{{ route('invoice_details.update', [$invoice->id, $detail->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_id">Sản Phẩm:</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->SanPhamId }}" {{ $detail->product_id == $product->SanPhamId ? 'selected' : '' }}>
                        {{ $product->TenSanPham }} - Giá: {{ number_format($product->GiaSanPham, 0, ',', '.') }} đ
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Số Lượng:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $detail->quantity }}" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">Cập Nhật</button>
        <a href="{{ route('invoice_details.index', $invoice->id) }}" class="btn btn-secondary">Quay Lại</a>
    </form>
</div>
@endsection
