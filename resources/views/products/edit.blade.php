@extends('layouts.app')

@section('content')

    <h1>Edit Product </h1>

    

    @include('includes.messages')



    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')

       
        <label for="price">Product Price:</label>
        <input type="number" name="price" required value="{{ $product->price }}">
        <br><br>
        
        <button type="submit">Update Product</button>
    </form>
    
@endsection