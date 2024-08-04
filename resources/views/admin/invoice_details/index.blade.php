<!-- resources/views/invoices/show.blade.php -->
<link rel="stylesheet" href="{{ url('CSS/invoice.css') }}">

@extends('admin.head')

@section('title', 'Chi Tiết Hóa Đơn')

@section('content')
<div class="invoice-container">
    <h1 class="invoice-title">HÓA ĐƠN THANH TOÁN</h1>

    <div class="invoice-header">
        <div class="left-header">
            <p><strong>Số Hóa Đơn:</strong> {{ $invoice->id }}</p>
            <p><strong>Ngày Lập:</strong> {{ $invoice->created_at->format('d/m/Y') }}</p>
            <p><strong>Tên Khách Hàng:</strong> {{ $invoice->customer->ten_khach_hang }}</p>
            <p><strong>Số Điện Thoại:</strong> {{ $invoice->customer->so_dien_thoai }}</p>
        </div>
        <div class="right-header">
            <p><strong>Tuấn Nguyễn Store</strong></p>
            <p><strong>Địa chỉ:</strong> 99 Hồ Đắc Di</p>
            <p><strong>Mã số thuế:</strong> 868699</p>
            <p><strong>SDT:</strong> 09099909</p>
        </div>
    </div>

    <h2 class="product-details-title">Chi Tiết Sản Phẩm</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
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
                    <td>{{ $detail->product->TenSanPham ?? 'N/A' }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->product->GiaSanPham ?? 0, 0, ',', '.') }} đ</td>
                    <td>{{ number_format($productTotal, 0, ',', '.') }} đ</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right"><strong>Thành Tiền:</strong></td>
                <td><strong>{{ number_format($totalAmount, 0, ',', '.') }} đ</strong></td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection


<style>
/* resources/css/invoice.css */

.invoice-container {
    background-color: #f4f4f9;
    border-radius: 8px;
    padding: 20px;
    margin: 20px auto;
    max-width: 1000px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.invoice-title {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 30px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.invoice-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.left-header,
.right-header {
    width: 48%;
}

.right-header {
    text-align: right; /* Căn phải cho text trong khối bên phải */
}

.left-header p,
.right-header p {
    margin: 5px 0;
    font-size: 16px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th,
.table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}

.table th {
    background-color: #343a40;
    color: white;
    text-transform: uppercase;
}

.table tfoot {
    background-color: #f8f9fa;
}

.product-details-title {
    margin-top: 20px;
    font-size: 18px;
    font-weight: bold;
    text-align: left;
}

.text-right {
    text-align: right;
}

strong {
    font-weight: bold;
}

</style> 