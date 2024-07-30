<link rel="stylesheet" href="{{ asset('resources/css/invoice.css') }}">
@extends('layouts.app')

@section('content')
    <h1>Thêm Sản Phẩm Vào Hóa Đơn {{ $invoice->id }}</h1>
    <form action="{{ route('invoice_details.store', $invoice->id) }}" method="POST">
        @csrf
        <label for="item_name">Tên Sản Phẩm:</label>
        <input type="text" id="item_name" name="item_name">
        <label for="quantity">Số Lượng:</label>
        <input type="text" id="quantity" name="quantity">
        <label for="price">Giá:</label>
        <input type="text" id="price" name="price">
        <button type="submit">Lưu</button>
    </form>
@endsection
