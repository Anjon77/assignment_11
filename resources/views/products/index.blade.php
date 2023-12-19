@extends('layouts.app')

@section('content')


    <h1>All Product List</h1>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>Name ---</th>
                <th>Price ---</th>
                <th>Quantity ---</th>
                <th>Price Update ---</th>
                <th>Show ---</th>
                
                <th>Delete ---</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    
                    <td>{{ $product->name }}  </td>
                    <td>{{ $product->price }}  </td>
                    <td>{{ $product->qty }} </td>

                    <td><a class="btn btn-primary" href="{{ route('products.update-price',$product->id) }}">Update Price</a></td>
                   
                    <td><a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a></td>

                    <td>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>


    
@endsection