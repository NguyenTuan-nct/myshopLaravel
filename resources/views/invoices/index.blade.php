@extends('layouts.app')

@section('title', 'Invoices')

@section('content')
    <h1>Hóa Đơn</h1>
    <a href="{{ route('invoices.store') }}" class="btn btn-primary mb-3">Add New Invoice</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Hóa Đơn</th>
                <th>Tên Khách Hàng</th>
                <th>Địa Chỉ</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->customer_name }}</td>
                    <td>{{ $invoice->total_amount }}</td>
                    <td>
                        <a href="{{ route('invoice_details.index', $invoice->id) }}" class="btn btn-info btn-sm">View Details</a>
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
