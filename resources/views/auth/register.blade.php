@extends('layouts.template')

@section('meta')
@endsection

@section('title', "Grapplers Elite - Add New Administrator")

@section('stylesheets')
@endsection

@section('content')
<div class="row">
    <div class="offset-lg-2 col-lg-8 col-md-12 col-12">
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">Add Administrator</h3>
                <h6 class="card-subtitle mb-2 text-muted"><b class="text-danger">WARNING: </b>Administrators have full rights to edit any of the content on this site.</h6>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="first_name" class="col-12 control-label no-padding">First Name</label>
                        <div class="col-12 no-padding">
                            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-12 control-label no-padding">Last Name</label>
                        <div class="col-12 no-padding">
                            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-12 control-label no-padding">E-Mail Address</label>
                        <div class="col-12 no-padding">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
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
                    <div class="form-group">
                        <label for="password-confirm" class="col-12 control-label no-padding">Confirm Password</label>
                        <div class="col-12 no-padding">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="col-md-4 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-square">
                                Register
                            </button>
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