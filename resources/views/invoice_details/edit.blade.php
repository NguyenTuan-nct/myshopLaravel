<link rel="stylesheet" href="{{ asset('resources/css/invoice.css') }}">
@extends('layouts.app')

@section('content')
    <h1>Chỉnh sửa hóa đơn - Hóa đơn {{ $invoice->id }}</h1>
    <form action="{{ route('invoice_details.update', [$invoice->id, $detail->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="item_name">Tên Sản Phẩm:</label>
        <input type="text" id="item_name" name="item_name" value="{{ $detail->item_name }}">
        <label for="quantity">Số Lượng:</label>
        <input type="text" id="quantity" name="quantity" value="{{ $detail->quantity }}">
        <label for="price">Giá:</label>
        <input type="text" id="price" name="price" value="{{ $detail->price }}">
        <button type="submit">Cập Nhật</button>
    </form>
@endsection