<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{


    public function saleHistory()
    {
        $sales = Sale::with('product')->orderBy('created_at', 'desc')->paginate(5);
        return view('sales-history', compact('sales'));
    }



    
}




