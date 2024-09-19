@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            @if(session('category_delete'))
                    <div class="alert alert-danger">{{ session('category_delete') }}</div>
                    @endif
            <div class="card-header bg-primary"><h3 class="text-white">Category List</h3></div>
            <div class="card-body">
              <form action="{{ route('check.delete') }}" method="POST">
                @csrf
                <table class="table table-hover">
                    <tr>
                      <th width="10">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" id="chkSelectAll" class="form-check-input">
                                check all
                            <i class="input-frame"></i></label>
                        </div>
                      </th>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Photo</th>
                      <th>Action</th>
                    </tr>

                    @foreach($categories as $sl=>$category)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="category_id[]" class="form-check-input chkDel" value="{{ $category->id }}">

                                            <i class="input-frame"></i></label>
                                        </div>
                                    </td>
                                <td>{{$sl+1}} </td>
                                <td>{{$category->category_name}} </td>
                                <td><img src="{{ asset('uploads/category') }}/{{ $category->category_image }}" alt=""> </td>
                                <td>
                                    <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger">delete</a>
                                </td>
                                </tr>
                        @endforeach

                </table>
               <div class="my-2">
                <button id="del-all" class="btn btn-danger d-none">Deleted cheack</button>
               </div>
            </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><h3>Add New Category</h3></div>
            <div class="card-body">
                <form action="{{ route('category.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
                 <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" name="category_name" class="form-control">
                    @error('category_name')
                     <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                 </div>
                 <div class="mb-3">
                    <label class="form-label">Category image</label>
                    <input type="file" name="category_image" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    @error('category_image')
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
@section('footer_script')
                @if(session('category'))
                <script>
                    Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "category added successfuly!",
                    showConfirmButton: false,
                    timer: 1500
                  });
                </script>
                @endif
    <script>
        $("#chkSelectAll").on('click', function(){
        this.checked ? $(".chkDel").prop("checked",true) : $(".chkDel").prop("checked",false);
        $('#del-all').toggleClass('d-none');

    })
    $('.chkDel').click(function(){
        $('#del-all').removeClass('d-none');
    })
    </script>
   @endsection
@endsection
