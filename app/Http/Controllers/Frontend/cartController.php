<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\UnitRumah;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{

    public function addunit(Request $request)
    {
       $unit_id = $request->input('unit_id'); 
       $unit_qty = $request->input('unit_qty'); 

       if(Auth::check())
       {
            $unit_check = UnitRumah::where('id',$unit_id)->first();
               
            if($unit_check)
            {
                if(Cart::where('unit_id',$unit_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $unit_check->name." sudah ditambahkan"]);
                }
                else
                {
                    $cartitem = new Cart();
                    $cartitem->unit_id = $unit_id;
                    $cartitem->user_id = Auth::id();
                    $cartitem->unit_qty = $unit_qty;
                    $cartitem->save();
                    return response()->json(['status' => $unit_check->name." berhasil ditambahkan"]);
                }  
            }
       }
       else
       {
            return response()->json(['status' => "login to continue"]);
       }
    }

    public function viewcart()
    {
        $cartitem = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartitem'));
    }

    public function deletecartitem(Request $request)
    {
        if(Auth::check())
        {
            $unit_id = $request->input('unit_id');
            if(Cart::Where('unit_id', $unit_id)->where('user_id',Auth::id())->exists())
            {
                $cartitem = Cart::Where('unit_id', $unit_id)->where('user_id',Auth::id())->first();
                $cartitem->delete();
                return response()->json(['status' => "Unit Deleted Successfully"]);

            }
        }
        else
        {
            return response()->json(['status' => "login to continue"]);
        }
        
    }

    public function updatecart(Request $request)
    {
        $unit_id = $request->input('unit_id');
        $unitrumah_qty = $request->input('unit_qty');

        if(Auth::check())
        {
            if(Cart::Where('unit_id', $unit_id)->where('user_id',Auth::id())->exists())
            {
                $cart = Cart::where('unit_id', $unit_id)->where('user_id',Auth::id())->first();
                $cart->unit_qty = $unitrumah_qty;
                $cart->update();
                return response()->json(['status' => "Jumlah di update"]);
            }
        }
    }

    public function cartcount()
    {
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=> $cartcount]);
    }
}
