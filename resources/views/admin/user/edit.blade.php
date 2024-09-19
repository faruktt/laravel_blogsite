@extends('admin')
@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">Update Profile</h3></div>
            <div class="card-body">
                @section('footer_script')
                @if(session('success'))
                <script>
                    Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Profile Update Succesfully",
                    showConfirmButton: false,
                    timer: 1500
                  });
                </script>
                @endif
                @endsection

                <form action="{{ route('update.profile') }}" method="POST">
                @csrf
                    <div class="mb-3">
                        <label class="from-label">Enter Your Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="from-label">Enter Your Email</label>
                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="mb-3">
                     <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">Update password</h3></div>
            <div class="card-body">
                @section('footer_script')
                @if(session('update'))
                <script>
                    Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "password Update Succesfully",
                    showConfirmButton: false,
                    timer: 1500
                  });
                </script>
                @endif
                @endsection
                <form action="{{ route('update.password') }}" method="POST">
             @csrf
                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control">
                        @error('current_password')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        @if(session('error_current_pass'))
                    <div class="alert alert-success">
                        {{ session('error_current_pass') }}
                    </div>
                @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comfirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                        @error('password_confirmation')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Update Photo</h3>
            </div>
            <div class="card-body">


                @section('footer_script')
                @if(session('psuccess'))
                <script>
                    Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Profile add Succesfully",
                    showConfirmButton: false,
                    timer: 1500
                  });
                </script>
                @endif
                @endsection
                <form action="{{ route('update.photo') }}" method="POST" enctype="multipart/form-data">
            @csrf
                    <div class="mb-3">
                        <label class="form-label">Upload Photo</label>
                        @if(session('photo_update'))
                    <div class="alert alert-danger">{{ session('photo_update') }}</div>
                    @endif
                        <input type="file" class="form-control" name="photo"
                               onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
                    </div>
                    <div class="mb-3">
                        <!-- Image preview -->
                        <img id="blah" src="{{ asset('uploads/user') }}/{{ Auth::user()->photo }}" alt="Your Image" class="img-fluid" />
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection()
