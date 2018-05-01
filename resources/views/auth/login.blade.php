@extends('layouts.template')

@section('meta')
@endsection

@section('title', "Grapplers Elite - Login")

@section('stylesheets')
@endsection

@section('content')
<div class="row">
    <div class="offset-lg-3 col-lg-6 col-md-12 col-12">
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">Sign In</h3>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="col-12 control-label no-padding">Email</label>
                        <div class="col-12 no-padding">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-12 control-label no-padding">Password</label>
                        <div class="col-12 no-padding">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mx-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-4 offset-md-4 text-center">
                            <button type="submit" class="btn btn-primary btn-square">
                                Login
                            </button>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-2 text-center">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection