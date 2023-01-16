<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ListPerumahan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class listperumahanController extends Controller
{
    public function index()
    {
        $listperumahan = ListPerumahan::all();
        return view('admin.listperumahan.index', compact('listperumahan'));
    } 

    public function add()
    {
        return view('admin.listperumahan.add');
    }

    public function insert(Request $request)
    {
        $listperumahan = new ListPerumahan();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/listperumahan',$filename);
            $listperumahan->image = $filename;
        }
        
        $listperumahan->name = $request->input('name');
        $listperumahan->slug = $request->input('slug');
        $listperumahan->alamat = $request->input('alamat');
        $listperumahan->description = $request->input('description');
        $listperumahan->status = $request->input('status') == TRUE ?'1':'0';
        $listperumahan->meta_title = $request->input('meta_title');
        $listperumahan->meta_descrip = $request->input('meta_descrip');
        $listperumahan->meta_keywords = $request->input('meta_keywords');  
        $listperumahan->save();
        return redirect('listperumahan')->with('status',"List perumahan berhasil ditambahkan");
        
    }

    public function edit($id)
    {
        $listperumahan = ListPerumahan::find($id);
        return view('admin.listperumahan.edit', compact('listperumahan'));
    }

    public function update(Request $request, $id)
    {
        $listperumahan = ListPerumahan::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/listperumahan/'.$listperumahan->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/listperumahan',$filename);
            $listperumahan->image = $filename;
        }
        $listperumahan->name = $request->input('name');
        $listperumahan->slug = $request->input('slug');
        $listperumahan->alamat = $request->input('alamat');
        $listperumahan->description = $request->input('description');
        $listperumahan->status = $request->input('status') == TRUE ?'1':'0';
        $listperumahan->meta_title = $request->input('meta_title');
        $listperumahan->meta_descrip = $request->input('meta_descrip');
        $listperumahan->meta_keywords = $request->input('meta_keywords');  
        $listperumahan->update();
        return redirect('listperumahan')->with('status', "data perumahan berhasil di update");
    }

    public function destroy($id)
    {
       $listperumahan = ListPerumahan::find($id);
       if($listperumahan->image)
       {
            $path = 'assets/upload/listperumahan/'.$listperumahan->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
       } 
       $listperumahan->delete();
       return redirect('listperumahan')->with('status',"data rumah berhasil dihapus");
    }
}
