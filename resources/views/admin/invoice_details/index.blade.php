<link rel="stylesheet" href="{{ asset('resources/css/invoice.css') }}">
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Chi Tiết Hóa Đơn - Hóa Đơn {{ $invoice->id }}</h1>
    <a href="{{ route('invoice_details.create', $invoice->id) }}">Thêm Sản Phẩm</a>
    <table>
        <tr>
            <th>ID Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Hành Động</th>
        </tr>
        @foreach ($details as $detail)
            <tr>
                <td>{{ $detail->id }}</td>
                <td>{{ $detail->item_name }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ $detail->price }}</td>
                <td>
                    <a href="{{ route('invoice_details.edit', [$invoice->id, $detail->id]) }}">Edit</a>
                    <form action="{{ route('invoice_details.destroy', [$invoice->id, $detail->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
