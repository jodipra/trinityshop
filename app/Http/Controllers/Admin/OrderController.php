<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bayar;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $bayar = Bayar::where('status','0')->get();
        return view('admin.orders.index', compact('bayar'));
    }

    public function view($id)
    {
        $bayar = Bayar::where('id', $id)->first();
        //dd($bayar);
        return view('admin.orders.view', compact('bayar'));
    }

    public function updateorder(Request $request, $id)
    {
        $bayar = Bayar::find($id);
        $bayar->status = $request->input('order_status');
        $bayar->update();
        return redirect('orders')->with('status', "Order Updated Successfully");
    }

    public function orderhistory()
    {
        $bayar = Bayar::where('status','1')->get();
        return view('admin.orders.history', compact('bayar'));
    }
}
