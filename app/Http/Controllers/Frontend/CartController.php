<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request -> input('product_id');
        $product_qty = $request -> input('product_qty');
        if(Auth::check())
        {
            $prod_check = Product::where('id', $product_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return response() -> json(['status' => " Ya se agregó al carrito"]);
                }
                else{
                    $cartitem = new Cart();
                    $cartitem -> prod_id = $product_id;
                    $cartitem -> user_id = Auth::id();
                    $cartitem -> prod_qty = $product_qty;
                    $cartitem -> save();
                    return response() -> json(['status' => " Se agregó al carrito correctamente"]);
                }
            }
        }
        else{
            return response() -> json(['status' => "Inicia sesión para continuar"]);
        }
    }
}
