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

    public function viewcart()
    {
        if(Auth::check())
        {
            $caritems = Cart::where('user_id', Auth::id())->get();
            return view('frontend.cart', compact('caritems'));
        }
        else{
            return response() -> json(['status' => "Inicia sesión para continuar"]);
        }
        
    }

    public function updatecart(Request $request)
    {
        $prod_id = $request -> input('prod_id');
        $product_qty = $request -> input('prod_qty');
        if(Auth::check())
        {
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart -> prod_qty = $product_qty;
                $cart -> update();
                return response() -> json(['status' => "Cantidad actualizada satisfactoriamente"]);
            }
        }
        else{
            return response() -> json(['status' => "Inicia sesión para continuar"]);
        }
    }

    public function deleteproduct(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request -> input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $caritem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $caritem -> delete();
                return response() -> json(['status' => "Producto eliminado satisfactoriamente"]);
            }
        }
        else{
            return response() -> json(['status' => "Inicia sesión para continuar"]);
        }
    }

    public function cartcount()
    {
        $carcount = Cart::where('user_id', Auth::id())->count();
        return response() -> json(['count' => $carcount]);
    }
}
