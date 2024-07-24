<link rel="stylesheet" href="{{ asset('resources/css/invoice.css') }}">
@extends('layouts.main')

@section('content')
    <h1>Create Invoice</h1>
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name">
        <label for="total_amount">Total Amount:</label>
        <input type="text" id="total_amount" name="total_amount">
        <button type="submit">Save</button>
    </form>
@endsection
