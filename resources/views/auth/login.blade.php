@extends('layouts.default')
@section('content')
<!-- Main -->
<div class="main" role="main">

        <!-- Page Heading -->
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Login</h1>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            {{-- <li><a href="#">Pages</a></li> --}}
                            <li class="active">Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Heading / End -->

        <!-- Page Content -->
        <section class="page-content">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-2"></div>

                    <div class="col-md-8">
                        <div class="box">
                            <h3>Login</h3>
                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                @csrf
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                    </div>
                                @endif

                                <div class="form-group{{ $errors->has('identity') ? ' has-error' : '' }}">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="clearfix">
                                        <label class="pull-left">
                                            Password <span class="required">*</span>
                                        </label>
                                        <span class="pull-right">
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        </span>
                                    </div>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary btn-inline">Login</button>&nbsp; &nbsp; &nbsp; 
                                <label for="remember" class="checkbox-inline">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                </label>
                            </form>
                            <hr>
                            <h4 class="text-center">Or with social media</h3>
                            @include('partials.socials-icons')
                        </div>

                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </section>

@stop    