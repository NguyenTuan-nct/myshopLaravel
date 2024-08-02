<link rel="stylesheet" href="{{ url('CSS/invoice.css') }}">
@extends('admin.layouts.app')

@section('content')
    <h1>Sửa Hóa Đơn</h1>
    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="customer_name">Tên Khách Hàng:</label>
        <input type="text" id="customer_name" name="customer_name" value="{{ $invoice->customer_name }}">
        <label for="total_amount">Tổng Số Lượng:</label>
        <input type="text" id="total_amount" name="total_amount" value="{{ $invoice->total_amount }}">
        <button type="submit">Cập Nhật</button>
    </form>
@endsection
