@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header card-header-primary" style="background: royalblue!important;">
            <h4 class="card-title">Mengubah Unit rumah</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-unitrumah/'.$unitrumah->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')    
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                            <option value="">{{ $unitrumah->listperumahan->name }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{ $unitrumah->name }}"name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{ $unitrumah->slug }}" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Type</label>
                        <input type="text" class="form-control" value="{{ $unitrumah->type }}" name="type">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Luas Tanah</label>
                        <input type="number" class="form-control" value="{{ $unitrumah->lt }}" name="lt">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Luas Bangunan</label>
                        <input type="number" class="form-control" value="{{ $unitrumah->lb }}" name="lb"> 
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $unitrumah->description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Spesifikasi</label>
                        <textarea name="spesifikasi" rows="3" class="form-control">{{ $unitrumah->spesifikasi }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" value="{{ $unitrumah->original_price }}" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{ $unitrumah->selling_price }}" name="selling_price"> 
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">UTJ Price</label>
                        <input type="number" class="form-control" value="{{ $unitrumah->utj_price }}" name="utj_price"> 
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity </label>
                        <input type="number" class="form-control"  value="{{ $unitrumah->qty }}"name="qty"> 
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $unitrumah->status == '1' ? 'checked' : '' }} name="status">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta title</label>
                        <input type="text" class="form-control" value="{{ $unitrumah->meta_title }}" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta description</label>
                        <textarea name="meta_descrip" rows="3" class="form-control">{{ $unitrumah->meta_descrip }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{ $unitrumah->meta_keywords }}</textarea>
                    </div>
                    @if ($unitrumah->image)
                        <img src="{{ asset('assets/uploads/unitrumah/'.$unitrumah->image) }}" alt="" style="width: 20%">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control" style="width: 20%">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" style="background: royalblue!important;">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection