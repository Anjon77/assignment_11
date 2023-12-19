@extends('layouts.app')

@section('content')


    <h1>Single Product</h1>
    <table>
        <thead>
            <tr>
                <th>Name ---</th>
                <th>Price ---</th>
                <th>Quantity</th>
                <th>Edit ---</th>

                <th>Delete ---</th>
            </tr>
        </thead>
        <tbody>
           
                <tr>
                    <td>{{ $product->name }} --- </td>
                    <td>{{ $product->price }} --- </td>
                    <td>{{ $product->qty }} --- </td>

                    <td><a class="btn btn-primary" href="{{ route('products.update-price',$product->id) }}">Update Price</a></td>
                    
                    <td>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            
        </tbody>
    </table>


    
@endsection