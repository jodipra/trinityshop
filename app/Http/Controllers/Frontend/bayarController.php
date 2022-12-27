<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Bayar;
use App\Models\Order;
use App\Models\UnitRumah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class bayarController extends Controller
{
    public function index() 
    {
        $old_cartitem = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitem as $item)
        {
            if(!UnitRumah::where('id',$item->unit_id)->where('qty','>=',$item->unit_qty)->exists())
            {
                $removeitem = Cart::where('user_id',Auth::id())->where('unit_id',$item->unit_id)->first();
                $removeitem->delete();
            }
        }
        $cartitem = Cart::where('user_id', Auth::id())->get();

        return view('frontend.bayar', compact('cartitem'));
    }

    public function bayarsekarang(Request $request)
    {
        $bayar = new Bayar();
        $bayar->user_id = Auth::id();
        if($request->hasFile('buktipembayaran'))
        {
            $file = $request->file('buktipembayaran');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/buktipembayaran/',$filename);
            $bayar->image = $filename;
            
        }
        $bayar->name = $request->input('name');
        $bayar->lname = $request->input('lname');
        $bayar->email = $request->input('email');
        $bayar->phone = $request->input('phone');
        $bayar->alamat= $request->input('alamat');
        $bayar->kota = $request->input('kota');
        $bayar->provinsi = $request->input('provinsi');
        // $bayar->negara = $request->input('negara');
        $bayar->kodepos = $request->input('kodepos');
        $bayar->payment_mode = $request->input('payment_mode');
        $bayar->payment_id = $request->input('payment_id');
        //menghitung total harga
        $total = 0;
        $cartitem_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitem_total as $unit)
        {
            $total += $unit->unitrumah->utj_price * $unit->unit_qty;
        } 

        $bayar->total_price = $total;

        $bayar->tracking_no = 'Trinity'.rand(1111,9999);
        $bayar->save();
        
        $cartitem = Cart::where('user_id', Auth::id())->get();
        foreach($cartitem as $item)
        {
            Order::create([
                    'order_id' => $bayar->id,
                    'unit_id' => $item->unit_id,
                    'qty' => $item->unit_qty,
                    'price' => $item->unitrumah->utj_price,

            ]);

            $unit = UnitRumah::where('id', $item->unit_id)->first();
            $unit->qty = $unit->unit_qty - $item->unit_qty;
            $unit->update();
        }
        if(Auth::user()->alamat == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('name');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->alamat= $request->input('alamat');
            $user->kota = $request->input('kota');
            $user->provinsi = $request->input('provinsi');
            // $user->negara = $request->input('negara');
            $user->kodepos = $request->input('kodepos');
            $user->update();
        }
        $cartitem = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitem);
        
        if($request->input('payment_mode') == "paid by razorpay" || $request->input('payment_mode') == "paid by Paypal")
        {
            return response()->json(['status'=>"Pembayaran Berhasil"]);
        }
        return redirect('/')->with('status',"Pembayaran Berhasil");

    }

    public function razorpaycheck(Request $request)
    {
        Log::debug($request);
        $cartitem = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitem as $item)
        {
            $total_price += $item->unitrumah->utj_price * $item->unit_qty;
        }
            $name = $request->input('name'); 
            $lname = $request->input('lname');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $alamat = $request->input('alamat');
            $kota = $request->input('kota');
            $provinsi = $request->input('provinsi');
            // $negara = $request->input('negara');
            $kodepos = $request->input('kodepos');

            return response()->json([
            'name'=> $name,   
            'lname'=> $lname, 
            'email'=> $email, 
            'phone'=> $phone, 
            'alamat'=> $alamat, 
            'kota'=> $kota, 
            'provinsi'=> $provinsi, 
            // 'negara'=> $negara, 
            'kodepos'=> $kodepos, 
            'total_price' => $total_price,
            ]);
    }
}