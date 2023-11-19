@extends('backend.layout.app1')
@section('content')
<div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                        </a>
                        <h3>Sign Up</h3>
                    </div>
                    <form action="{{route('signup.store')}}" method="post">
                        @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="FullName" name="FullName" placeholder="enter your name" value="{{old('FullName')}}" >
                        @if($errors->has('FullName'))
                            <small class="d-block text-danger">
                                {{$errors->first('FullName')}}
                            </small>
                        @endif
                        <label for="FullName">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="EmailAddress" name="EmailAddress" placeholder="enter your email" value="{{old('EmailAddress')}}">
                        @if($errors->has('EmailAddress'))
                        <small class="d-block text-danger">
                            {{$errors->first('EmailAddress')}}
                        </small>
                    @endif
                        <label for="EmailAddress">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="contact_no_en" name="contact_no_en" placeholder="enter your nmbr" value="{{old('contact_no_en')}}">
                        @if($errors->has('contact_no_en'))
                            <small class="d-block text-danger">
                                {{$errors->first('contact_no_en')}}
                            </small>
                        @endif
                        <label for="contact_no_en">Contact Number</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        @if($errors->has('password'))
                            <small class="d-block text-danger">
                                {{$errors->first('password')}}
                            </small>
                        @endif
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Password" name="password_confirmation">
                        <label for="password_confirmation"> Confirm Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <a href="">Forgot Password</a>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                    <p class="text-center mb-0">Already have an Account? <a href="{{'signin'}}">Sign In</a></p>
                </div>
            </form>
            </div>
       
        </div>
    </div>
    <!-- Sign Up End -->
</div>
@endsection