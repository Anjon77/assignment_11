@extends('layouts.app')

@section('content')

    <h1>Create Product</h1>


    @include('includes.messages')

    <form action="/products/store" method="post">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" name="name" required>
        <br><br>
        <label for="price">Product Price:</label>
        <input type="number" name="price" required>
        <br><br>
        <label for="qty">Product Quantity:</label>
        <input type="number" name="qty" required>
        <br><br>
        <button type="submit">Add Product</button>
    </form>
    
@endsection