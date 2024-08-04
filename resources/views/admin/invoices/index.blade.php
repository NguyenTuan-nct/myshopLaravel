<link rel="stylesheet" href="{{ url('CSS/invoice.css') }}">
@extends('admin.head')

@section('title', 'Invoices')

@section('content')
    <h1>Hóa Đơn</h1>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">Add New Invoice</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Hóa Đơn</th>
                <th>Tên Khách Hàng</th>
                <th>Thành Tiền</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->customer ? $invoice->customer->ten_khach_hang : 'N/A' }}</td>
                    <td>{{ number_format($invoice->total_amount, 0, ',', '.') }} đ</td>
                    <td>
                        <a href="{{ route('invoice_details.index', $invoice->id) }}" class="btn btn-info btn-sm">Xem Chi Tiết</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
