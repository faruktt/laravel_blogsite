@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">User List</h3></div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Photo</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
               @foreach($users as $sl=>$user)
                        <tr>
                          <td>{{$sl+1}} </td>
                          <td>{{$user->name}} </td>
                          <td>{{$user->email}} </td>
                          <td><img src="{{ asset('uploads/user') }}/{{ $user->photo }}" alt=""> </td>
                          <td>
                            <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger">delete</a>
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
            @if(session('success'))
            <div class="alert alert-danger">{{ session('success') }}</div>
            @endif

            <div class="card-header bg-primary"><h3 class="text-white">Add User</h3></div>
            <div class="card-body">
                <form action="{{ route('user.add') }}" method="POST">
                  @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                       <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@section('footer_script')
@if(session('delete'))
<script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ session('delete') }}",
    showConfirmButton: false,
    timer: 1500
  });
</script>
@endif

@if(session('success'))
<script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ session('success') }}",
    showConfirmButton: false,
    timer: 1500
  });
</script>
@endif
@endsection



@endsection
