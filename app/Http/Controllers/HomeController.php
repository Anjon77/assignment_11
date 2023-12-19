<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\sale;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todaySalesProductsQuantity = Product::whereDate('created_at', today())->sum('qty');
        $yesterdaySalesProductsQuantity = Product::whereDate('created_at', today()->subDay())->sum('qty');
        $thisMonthSalesProductsQuantity = Product::whereMonth('created_at', today()->month)->sum('qty');
        $lastMonthSalesProductsQuantity = Product::whereMonth('created_at', today()->subMonth())->sum('qty');

        return view('home', compact(
            'todaySalesProductsQuantity', 
            'yesterdaySalesProductsQuantity', 
            'thisMonthSalesProductsQuantity', 
            'lastMonthSalesProductsQuantity'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
