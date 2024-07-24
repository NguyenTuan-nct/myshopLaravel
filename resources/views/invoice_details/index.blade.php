<link rel="stylesheet" href="{{ asset('resources/css/invoice.css') }}">
@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Invoice Details for Invoice #{{ $invoice->id }}</h1>
    <a href="{{ route('invoice_details.create', $invoice->id) }}">Add New Item</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
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
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
