<link rel="stylesheet" href="{{ asset('resources/css/invoice.css') }}">
@extends('layouts.main')

@section('content')
    <h1>Edit Invoice</h1>
    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" value="{{ $invoice->customer_name }}">
        <label for="total_amount">Total Amount:</label>
        <input type="text" id="total_amount" name="total_amount" value="{{ $invoice->total_amount }}">
        <button type="submit">Update</button>
    </form>
@endsection
