@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header card-header-primary" style="background: royalblue!important;">
            <h4 class="card-title">Edit list perumahan</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-listperumahan/'.$listperumahan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" value="{{ $listperumahan->name }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $listperumahan->slug }}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Alamat</label>
                        <input type="text" value="{{ $listperumahan->alamat }}" class="form-control" name="alamat">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $listperumahan->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $listperumahan->status == "1" ? 'checked':'' }} name="status">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta title</label>
                        <input type="text" value="{{ $listperumahan->meta_title }}" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta description</label>
                        <textarea name="meta_descrip" rows="3" class="form-control">{{ $listperumahan->meta_descrip }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{ $listperumahan->meta_keywords }}</textarea>
                    </div>
                    @if($listperumahan->image)
                        <img src="{{ asset('assets/uploads/listperumahan/'.$listperumahan->image) }}" alt="Perumahan image" style="width: 20%">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control" style="width: 20%">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" style="background: royalblue!important;">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection