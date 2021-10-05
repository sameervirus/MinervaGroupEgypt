@php $page = 'Sign in'; @endphp
@extends('layouts.english')

@section('title', 'Login')

@section('content')
<div class="container" id="about">
    <div class="row">
      <div class="col-lg-12">
        <h1>Sign in</h1>
      </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 forms">
            <div class="form-row">
                <div class="w100">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="col-lg-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>

                            <div class="">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>

                            <div class="">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <div class="">
                                <a class="btn btn-secondary" href="{{url()->previous()}}">Back</a>
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

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
</div>
@endsection
