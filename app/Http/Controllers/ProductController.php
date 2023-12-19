<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class ProductController extends Controller
{

    public function recordSaleAndUpdateQuantity(Product $product, $quantitySold)
    {
        // Record the sale
        $sale = Sale::create([
            'product_id' => $product->id,
            'quantity_sold' => $quantitySold,
            'amount' => $product->price * $quantitySold,
        ]);

        // Update the product quantity
        $product->decrement('quantity', $quantitySold);

        return $sale;
    }

































    
    public function salesHistory()
    {
        // Get sale transaction history
        $salesHistory = Sale::with('product')->latest()->get();

        return view('sales.history', compact('salesHistory'));
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());
        return redirect()->route('products.create')
                        ->with('success','Product created successfully.');                
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

 
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
        
    }

    public function updatePrice(Request $request, Product $product)
    {
        $request->validate([
           
            'price' => 'required|numeric',
        ]);
    
        $product->update([
            
            'price' => $request->input('price'),
        ]);
    
        return redirect()->route('products.index')
                        ->with('success', 'Product Price updated successfully');
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product Deleted successfully');
    }
}



// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Product;
// use App\Sale;
// use DB;

// class ProductController extends Controller
// {
//     public function index()
//     {
//         $todaySales = Sale::whereDate('created_at', today())->sum('quantity');
//         $yesterdaySales = Sale::whereDate('created_at', yesterday())->sum('quantity');
//         $monthSales = Sale::whereMonth('created_at', now()->month)->sum('quantity');
//         $lastMonthSales = Sale::whereMonth('created_at', now()->month - 1)->sum('quantity');

//         $products = Product::all();

//         return view('dashboard', compact('todaySales', 'yesterdaySales', 'monthSales', 'lastMonthSales', 'products'));
//     }

//     public function create()
//     {
//         return view('product.create');
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'name' => 'required|string|max:255',
//             'category' => 'required|string|max:255',
//             'quantity' => 'required|integer|min:1',
//             'price' => 'required|numeric|min:0',
//         ]);

//         DB::table('products')->insert($validatedData);

//         return redirect()->route('product.index')->with('success', 'Product added successfully!');
//     }

//     public function sell(Product $product)
//     {
//         return view('product.sell', compact('product'));
//     }

//     public function updateSale(Product $product, Request $request)
//     {
//         $validatedData = $request->validate([
//             'quantity' => 'required|integer|min:1|max:' . $product->quantity,
//         ]);

//         $soldQuantity = $validatedData['quantity'];

//         if ($soldQuantity <= $product->quantity) {
//             $product->quantity -= $soldQuantity;
//             $product->save();

//             Sale::create([
//                 'product_id' => $product->id,
//                 'quantity' => $soldQuantity,
//                 'date' => now(),
//             ]);

//             return redirect()->route('product.index')->with('success', 'Product sold successfully!');
//         } else {
//             return redirect()->route('product.sell', $product)->with('error', 'Insufficient quantity!');
//         }
//     }

//     public function updatePrice(Product $product)
//     {
//         return view('product.update-price', compact('product'));
//     }

//     public function updatePriceStore(Product $product, Request $request)
//     {
//         $validatedData = $request->validate([
//             'price' => 'required|numeric|min:0',
//         ]);

//         $product->price = $validatedData['price'];
//         $product->save();

//         return redirect()->route('product.index')->with('success', 'Product price updated successfully!');
//     }
// }

