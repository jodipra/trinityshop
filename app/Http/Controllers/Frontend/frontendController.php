<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\ListPerumahan;
use App\Models\UnitRumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class frontendController extends Controller
{
    //kode hizkia
    // public function index()
    // {
    //     $featured_unitrumah = UnitRumah::where('status','1')->take(10)->get();
    //     // dd($featured_unitrumah);
    //     return view('frontend.index',compact('featured_unitrumah'));
    // }
    public function index()
    {
        $featured_unitrumah = UnitRumah::where('status','1')->take(10)->get();
        // dd($featured_unitrumah);
        return view('landing',compact('featured_unitrumah'));
    }

    public function listrumah()
    {
        $listrumah = ListPerumahan::where('status','1')->get();
        return view('frontend.listrumah',compact('listrumah'));

    }

    public function viewlistrumah($slug)
    {
        if(ListPerumahan::where('slug', $slug)->exists())
        {
            $listperumahan = ListPerumahan::where('slug', $slug)->first();
            $unitrumah = UnitRumah::where('listrumah_id',$listperumahan->id)->where('status','1')->get();
            return view('frontend.unitrumah.index',compact('listperumahan','unitrumah'));
        }
        else{
            return redirect('/')->with('status',"slug tidak tersedia");
        }
    }
    public function unitview($listperumahan_slug, $unitrumah_slug)
    {
        if(ListPerumahan::where('slug', $listperumahan_slug)->exists())
        { 
            if(UnitRumah::where('slug', $unitrumah_slug)->exists())
            {
                $unitrumah = UnitRumah::where('slug', $unitrumah_slug)->first();
                return view('frontend.unitrumah.view', compact('unitrumah'));
            }
            else{
                return redirect('/')->with('status',"The link was broken");
            }
        }
        else{
            return redirect('/')->with('status',"Tidak ditemukan data perumahan");
        }
    }
    
    public function unitlistajax()
    {
        $unitrumah = UnitRumah::select('name')->where('status', '1')->get();
        $data = [];

        foreach ($unitrumah as $item) {
            $data[] = $item['name'];
        }

        return $data;
    }
    public function searchunit(Request $request)
    {
        $searched_unit = $request['unit_name'];

        if($searched_unit != '')
        {
            $unitrumah = UnitRumah::where("name", 'LIKE', "%$searched_unit%")->first();
            
            if($unitrumah)
            {
                return redirect('listrumah/'.$unitrumah->listperumahan->slug.'/'.$unitrumah->slug);
            }
            else{
                return redirect()->back()->with("status","Unit Rumah tidak ditemukan");
            }
        }
        else{
            return redirect()->back();
        }
    }
}
