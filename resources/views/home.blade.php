@extends('layouts.app')

@section('content')

    <h2>Dashboard</h2><hr>
        <h3>Sales Figures</h3><hr>
        <div>
            <p>Today's Sales: {{ $todaySalesProductsQuantity }}</p><hr>
            <p>Yesterday's Sales: {{ $yesterdaySalesProductsQuantity }}</p><hr> 
            <p>This Month's Sales: {{ $thisMonthSalesProductsQuantity }}</p><hr> 
            <p>Last Month's Sales: {{ $lastMonthSalesProductsQuantity }}</p><hr>
        </div>
    </div>

    
    
@endsection