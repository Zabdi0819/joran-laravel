<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_categories = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'trending_categories'));
    }

    public function know()
    {
        return view('frontend.know');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function delivery()
    {
        return view('frontend.delivery');
    }

    public function invoice()
    {
        return view('frontend.invoice');
    }

    public function guarantee()
    {
        return view('frontend.guarantee');
    }

    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug)
    {
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
        }
        else{
            return redirect('/')->with('status', "Categoría no existente");
        }
    }

    public function productview($cate_slug, $prod_slug)
    {
        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug))
            {
                $products = Product::where('slug', $prod_slug)->first();
                return view('frontend.products.view', compact('products'));
            }else{
                return redirect('/')->with('status', "Este link está roto");
            }
        }else{
            return redirect('/')->with('status', "No existe esta categoría");
        }
    }
}
