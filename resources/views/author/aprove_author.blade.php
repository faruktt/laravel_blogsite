@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">Author List</h3></div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Photo</th>
                      <th>Status</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
               @foreach($authors as $sl=>$author)
                        <tr>
                          <td>{{$sl+1}} </td>
                          <td>{{$author->username}} </td>
                          <td>{{$author->email}} </td>
                          <td>
                            @if($author->photo == null)
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKqLoqUmsRrIYZhDUsffr5nkWfPcqC0guRC6Rpilz0C_VFhVRgr51-juuumrbvbEZ4V8k&usqp=CAU" alt="">
                            @else
                            <img width="100" src="{{ asset('uplodas/author') }}/{{ $author->photo }}" alt="">
                            @endif
                          </td>
                          <td><a class="badge badge-{{ $author->status==1?'success':'light' }}">{{ $author->status==1? 'Active':'Deactive' }}</a></td>

                          <td>
                           <a href="{{ route('authors.status', $author->id) }}" class="btn btn-primary">{{ $author->status==1? 'Dective Author':'Active Author' }}</a>


                            <a href="" class="btn btn-{{ $author->status==1?'success':'light' }}">delete</a>
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
