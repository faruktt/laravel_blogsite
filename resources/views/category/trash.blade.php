@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">Trash List List</h3></div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Photo</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
               @foreach($trash_category as $sl=>$trash)
                        <tr>
                          <td>{{$sl+1}} </td>
                          <td>{{$trash->category_name}} </td>
                          <td><img src="{{ asset('uploads/category') }}/{{ $trash->category_image }}" alt=""> </td>
                          <td>
                            <a href="{{ route('category.restore',$trash->id) }}" class="btn btn-primary">restore</a>
                            <a href="{{ route('category.hard',$trash->id) }}" class="btn btn-danger">delete</a>
                          </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
