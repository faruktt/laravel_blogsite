@extends('home.master')
@section('content')
   <!--Login-->
   <section class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-8 m-auto">
                <div class="login-content">
                    <h4>Login</h4>
                    <p></p>
                    @if(session('aprove'))
                    <div class="alert alert-danger">{{ session('aprove') }}</div>
                    @endif
                    <form  action="{{ route('auth.singin') }}"  method="post">
                     @csrf   <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email*" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password*" name="password" >
                        </div>
                        <div class="sign-controls form-group">
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                            </div>
                            <a href="#" class="btn-link ">Forgot Password?</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-custom">Login</button>
                        </div>
                        <p class="form-group text-center">Don't have an account? <a href="{{ route('singup') }}" class="btn-link">Create One</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
