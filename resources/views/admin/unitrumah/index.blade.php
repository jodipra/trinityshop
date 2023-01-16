@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header card-header-primary" style="background: royalblue!important;">
            <h4 class="card-title">Daftar Unit Rumah</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Perumahan</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Original Price</th>
                            <th>Selling Price</th>
                            <th>UTJ Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unitrumah as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->listperumahan->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->original_price }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>{{ $item->utj_price }}</td>
                                <td>
                                    <img src="{{ asset('assets/uploads/unitrumah/'.$item->image) }}" class="cate-image" alt="Image here">
                                </td>
                                <td>
                                    <a href="{{ url('edit-unitrumah/'.$item->id) }}" class="btn btn-primary btn-sm" style="background: royalblue!important;">Edit</a>
                                    <a href="{{ url('delete-listrumah/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection