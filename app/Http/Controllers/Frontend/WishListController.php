<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlists'));
    }

    public function addWishlist(Request $request)
    {
        $product_id = $request -> input('product_id');
        if(Auth::check())
        {
            $prod_check = Product::where('id', $product_id)->first();

            if($prod_check)
            {
                if(Wishlist::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return response() -> json(['status' => " Ya se agregó a favoritos"]);
                }
                else{
                    $favitem = new Wishlist();
                    $favitem -> prod_id = $product_id;
                    $favitem -> user_id = Auth::id();
                    $favitem -> save();
                    return response() -> json(['status' => " Se agregó a favoritos correctamente"]);
                }
            }
        }
        else{
            return response() -> json(['status' => "Inicia sesión para continuar"]);
        }
    }

    public function deletewishlist(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request -> input('prod_id');
            if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $wishlists = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wishlists -> delete();
                return response() -> json(['status' => "Producto eliminado satisfactoriamente"]);
            }
        }
        else{
            return response() -> json(['status' => "Inicia sesión para continuar"]);
        }
    }

    public function wishlistcount()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response() -> json(['count' => $wishcount]);
    }
}
