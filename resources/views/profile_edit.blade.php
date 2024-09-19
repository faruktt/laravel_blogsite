@extends('admin')
@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">Update Profile</h3></div>
            <div class="card-body">
                <form action="" method="">
                    <div class="mb-3">
                        <label class="from-label">Enter Your Name</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="from-label">Enter Your Email</label>
                        <input type="email" class="form-control" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="mb-3">
                     <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection()