@extends('layouts.app')

@section('content')
    <h1>Sales History</h1>
    <table>
        <thead>
            <tr>
                <th>Date --</th>
                <th>Name --</th>
                <th>Quantity Sold --</th>
                <th>Amount --</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->created_at }}</td>
                    <td>{{ $sale->name }}</td>
                    <td>{{ $sale->quantity_sold }}</td>
                    <td>${{ $sale->amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


