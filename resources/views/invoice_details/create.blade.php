<link rel="stylesheet" href="{{ asset('resources/css/invoice.css') }}">
@extends('layouts.main')

@section('content')
    <h1>Add Item to Invoice #{{ $invoice->id }}</h1>
    <form action="{{ route('invoice_details.store', $invoice->id) }}" method="POST">
        @csrf
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name">
        <label for="quantity">Quantity:</label>
        <input type="text" id="quantity" name="quantity">
        <label for="price">Price:</label>
        <input type="text" id="price" name="price">
        <button type="submit">Save</button>
    </form>
@endsection
