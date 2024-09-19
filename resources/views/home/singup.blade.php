@extends('home.master')
@section('content')
 <!--Login-->
 <section class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-8 m-auto">
                <div class="login-content">
                    @if(session('author'))
                <div class="alert alert-danger">{{ session('author') }}</div>
                @endif
                    <h4>Sign up</h4>
                    <!--form-->
                    <form action="{{ route('auth.store') }}"  method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username*" name="username" >
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Address*" name="email" >
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password*" name="password" >
                        </div>
                        <div class="sign-controls form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                <label class="custom-control-label" for="rememberMe">Agree to our <a href="#" class="btn-link">terms & conditions</a> </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-custom">Sign Up</button>
                        </div>
                        <p class="form-group text-center">Already have an account? <a href="{{ route('singin') }}" class="btn-link">Login</a> </p>
                    </form>
                       <!--/-->
                </div>
            </div>
         </div>
    </div>
</section>





@endsection
