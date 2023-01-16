<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Wishlist;
use App\Models\UnitRumah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class wishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $unit_id = $request->input('unit_id');
            if(UnitRumah::find($unit_id))
            {
                $fWish = Wishlist::where('unit_id', $unit_id)->where('user_id', Auth::user()->id)->first();
                if(!empty($fWish) ) {
                    return response()->json(['status' => "Barang Sudah Ditambahkan di Wishlist"]);
                }
                $wish = new Wishlist();
                $wish->unit_id = $unit_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' =>"Unit ditambahkan ke wishlist"]); 

            }
            else{
                return response()->json(['status' =>"Unit sudah terjual"]); 
            }
        }
        else{
            return response()->json(['status' => "login to continue"]);

        }
    }

    public function deleteitem(Request $request)
    {
        if(Auth::check())
        {
            $unit_id = $request->input('unit_id');
            if(Wishlist::Where('unit_id', $unit_id)->where('user_id',Auth::id())->exists())
            {
                $wish = Wishlist::Where('unit_id', $unit_id)->where('user_id',Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Unit dihapus dari wishlist"]);

            }
        }
        else
        {
            return response()->json(['status' => "login to continue"]);
        }
    }

    public function wishlishcount()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$wishcount]);
    }
}
