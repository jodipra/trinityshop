<?php

namespace App\Http\Controllers\Admin;

use App\Models\UnitRumah;
use Illuminate\Http\Request;
use App\Models\ListPerumahan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class unitrumahController extends Controller
{
    public function index()
    {
        $unitrumah = UnitRumah::all();
        return view('admin.unitrumah.index',compact('unitrumah'));
    }
    public function add()
    {
        $listperumahan = ListPerumahan::all();
        return view('admin.unitrumah.add',compact('listperumahan'));
    }
    
    public function insert(Request $request)
    {
        $unitrumah = new UnitRumah();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/unitrumah/',$filename);
            $unitrumah->image = $filename;
        }
        $unitrumah->listrumah_id = $request->input('listrumah_id');
        $unitrumah->name = $request->input('name');
        $unitrumah->slug = $request->input('slug');
        $unitrumah->type = $request->input('type');
        $unitrumah->lt = $request->input('lt');
        $unitrumah->lb = $request->input('lb');
        $unitrumah->description = $request->input('description');
        $unitrumah->spesifikasi = $request->input('spesifikasi');
        $unitrumah->original_price = $request->input('original_price');
        $unitrumah->selling_price = $request->input('selling_price');
        $unitrumah->utj_price = $request->input('utj_price');
        $unitrumah->qty = $request->input('qty');
        $unitrumah->status = $request->input('status') == TRUE ?'1':'0';
        $unitrumah->meta_title = $request->input('meta_title');
        $unitrumah->meta_descrip = $request->input('meta_descrip');
        $unitrumah->meta_keywords = $request->input('meta_keywords');  
        $unitrumah->save();
        return redirect('unitrumah')->with('status',"unit rumah berhasil ditambahkan");
    }

    public function edit($id)
    {
        $unitrumah = UnitRumah::find($id);
        return view('admin.unitrumah.edit', compact('unitrumah'));
    }

    public function update(Request $request, $id)
    {
        $unitrumah = UnitRumah::find($id);

        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/unitrumah/'.$unitrumah->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/unitrumah/',$filename);
            $unitrumah->image = $filename;
        }
        $unitrumah->name = $request->input('name');
        $unitrumah->slug = $request->input('slug');
        $unitrumah->type = $request->input('type');
        $unitrumah->lt = $request->input('lt');
        $unitrumah->lb = $request->input('lb');
        $unitrumah->description = $request->input('description');
        $unitrumah->spesifikasi = $request->input('spesifikasi');
        $unitrumah->original_price = $request->input('original_price');
        $unitrumah->selling_price = $request->input('selling_price');
        $unitrumah->utj_price = $request->input('utj_price');
        $unitrumah->qty = $request->input('qty');
        $unitrumah->status = $request->input('status') == TRUE ?'1':'0';
        $unitrumah->meta_title = $request->input('meta_title');
        $unitrumah->meta_descrip = $request->input('meta_descrip');
        $unitrumah->meta_keywords = $request->input('meta_keywords');  
        $unitrumah->update();
        return redirect('unitrumah')->with('status', "unit rumah berhasil di update");
    }

    public function destroy($id)
    {
        $unitrumah = UnitRumah::find($id);
        $path = 'assets/uploads/unitrumah/'.$unitrumah->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $unitrumah->delete();
        return redirect('unitrumah')->with('status', "unit rumah berhasil di hapus");

}
}
