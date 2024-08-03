<link rel="stylesheet" href="{{ url('CSS/invoice.css') }}">
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Chi Tiết Hóa Đơn - Hóa Đơn {{ $invoice->id }}</h1>
    <a href="{{ route('invoice_details.create', $invoice->id) }}" class="btn btn-primary mb-3">Thêm Sản Phẩm</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalAmount = 0; // Biến để lưu tổng thành tiền
            @endphp

            @foreach ($details as $detail)
                @php
                    // Tính tổng tiền cho sản phẩm này
                    $productTotal = ($detail->product->GiaSanPham ?? 0) * $detail->quantity;
                    $totalAmount += $productTotal; // Cộng dồn vào tổng số tiền hóa đơn
                @endphp
                <tr>
                    <td>{{ $detail->product_id }}</td>
                    <td>{{ $detail->product->TenSanPham ?? 'N/A' }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->product->GiaSanPham ?? 0, 0, ',', '.') }} đ</td>
                    <td>{{ number_format($productTotal, 0, ',', '.') }} đ</td>
                    <td>
                        <a href="{{ route('invoice_details.edit', [$invoice->id, $detail->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('invoice_details.destroy', [$invoice->id, $detail->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-right"><strong>Thành Tiền:</strong></td>
                <td colspan="2"><strong>{{ number_format($totalAmount, 0, ',', '.') }} đ</strong></td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
