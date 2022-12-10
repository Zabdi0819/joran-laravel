<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
    }

    public function profile()
    {
        $user = User::where('id', Auth::id())->first();
        return view('frontend.profile', compact('user'));
    }

    public function updateprofile(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $user -> name = $request -> input('fname');
        $user -> lname = $request -> input('lname');
        $user -> email = $request -> input('email');
        $user -> phone = $request -> input('phone');
        $user -> address1 = $request -> input('address1');
        $user -> address2 = $request -> input('address2');
        $user -> city = $request -> input('city');
        $user -> state = $request -> input('state');
        $user -> country = $request -> input('country');
        $user -> pincode = $request -> input('pincode');
        $user -> update();


        return redirect('/')->with('status', "Perfil actualizado satisfactoriamente");
    }

    public function viewpdf($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        $pdf = Pdf::loadView('frontend.orders.pdf', ['orders' => $orders]);
        return $pdf->download('my-order.pdf');
    }
}
