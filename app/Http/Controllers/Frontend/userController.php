<?php

namespace App\Http\Controllers\frontend;

use App\Models\Bayar;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function index()
    {
        $bayar = Bayar::where('user_id', Auth::id())->get();
        return view('frontend.bayar.index', compact('bayar'));
    }

    public function view($id)
    {
        $bayar = Bayar::where('id', $id)->where('user_id', Auth::id())->first();
        //dd($bayar->order()->get());
        $bayar->total_price = number_format($bayar->total_price);
        
        return view('frontend.bayar.view', compact('bayar'));

        $bayar = Bayar::where('order')->get();
    }

}
