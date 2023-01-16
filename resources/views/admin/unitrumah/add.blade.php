@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header card-header-primary" style="background: royalblue!important;"> 
            <h4 class="card-title">Menambahkan Unit rumah</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-unitrumah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="listrumah_id">
                            <option value="">Pilih Perumahan</option>
                            @foreach ( $listperumahan as $item )
                                <option value="{{  $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Type</label>
                        <input type="text" class="form-control" name="type">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Luas Tanah</label>
                        <input type="number" class="form-control" name="lt">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Luas Bangunan</label>
                        <input type="number" class="form-control" name="lb"> 
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Spesifikasi</label>
                        <textarea name="spesifikasi" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price"> 
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">UTJ Price</label>
                        <input type="number" class="form-control" name="utj_price"> 
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity </label>
                        <input type="number" class="form-control" name="qty"> 
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta description</label>
                        <textarea name="meta_descrip" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" style="background: royalblue!important;">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection