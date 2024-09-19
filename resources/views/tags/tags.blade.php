@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">

            @section('footer_script')
            @if(session('tag_delete'))
            <script>
                Swal.fire({
                position: "center",
                icon: "success",
                title: "Tag delete successfuly!",
                showConfirmButton: false,
                timer: 1500
              });
            </script>
            @endif
            @endsection


            <div class="card-header bg-primary"><h3 class="text-white">Tags List</h3></div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
               @foreach($tags as $sl=>$tag)
                        <tr>
                          <td>{{$sl+1}} </td>
                          <td>{{$tag->tag_name}} </td>
                          <td>
                            <a href="{{ route('tag.delete',$tag->id) }}" class="btn btn-danger">delete</a>
                          </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">Add New Tags</h3></div>
            <div class="card-body">

                @if(session('tag'))
                <div class="alert alert-danger">{{ session('tag') }}</div>
                @endif
                <form action="{{ route('tags.add') }}" method="POST" >
            @csrf
                 <div class="mb-3">
                    <label class="form-label">Tags Name</label>
                    <input type="text" name="tag_name" class="form-control">
                    @error('tag_name')
                     <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                 </div>

                 <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Add New</button>
                 </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
