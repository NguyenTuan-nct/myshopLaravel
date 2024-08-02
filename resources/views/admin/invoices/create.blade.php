<link rel="stylesheet" href="{{ url('CSS/invoice.css') }}">
@extends('admin.layouts.app')

@section('content')
    <h1>Tạo Hóa Đơn</h1>
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <label for="customer_name">Tên Khách Hàng:</label>
        <input type="text" id="customer_name" name="customer_name">
        <label for="total_amount">Số Điện Thoại:</label>
        <input type="text" id="total_amount" name="total_amount">
        <button type="submit">Lưu</button>
    </form>
@endsection
