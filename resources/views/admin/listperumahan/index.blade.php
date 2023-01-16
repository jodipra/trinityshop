@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header card-header-primary" style="background: royalblue!important;">
            <h4 class="card-title">Daftar Perumahan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listperumahan as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <img src="{{ asset('assets/uploads/listperumahan/'.$item->image) }}" class="cate-image" alt="Image here">
                                </td>
                                <td>
                                    <a href="{{ url('edit-listperumahan/'.$item->id) }}" class="btn btn-primary" style="background: royalblue!important;">Edit</a>
                                    <a href="{{ url('delete-listperumahan/'.$item->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection