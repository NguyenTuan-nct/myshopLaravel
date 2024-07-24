<link rel="stylesheet" href="{{ asset('resources/css/invoice.css') }}">
@extends('layouts.main')

@section('content')
    <h1>Edit Item for Invoice #{{ $invoice->id }}</h1>
    <form action="{{ route('invoice_details.update', [$invoice->id, $detail->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" value="{{ $detail->item_name }}">
        <label for="quantity">Quantity:</label>
        <input type="text" id="quantity" name="quantity" value="{{ $detail->quantity }}">
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="{{ $detail->price }}">
        <button type="submit">Update</button>
    </form>
@endsection
