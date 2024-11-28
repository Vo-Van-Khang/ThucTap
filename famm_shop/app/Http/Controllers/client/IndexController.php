<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $products=Product::all();
//         $new_arrivals_pr = Product::take(8)->get(); // Lấy 4 sản phẩm
//         // Hoặc
    
// // Lấy sản phẩm từ 7 đến 12 (Hot New)
//          $hot_salle_pr = Product::skip(8)->take(4)->get();
        
        return view('client.index', compact('products'));
    }
}
