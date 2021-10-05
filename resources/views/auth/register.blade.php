@php $page = 'Registration'; @endphp
@extends('layouts.english')

@section('title', 'Registration')

@section('content')
<div class="container" id="about">
    <div class="row">
      <div class="col-lg-12">
        <h1>Registration</h1>
      </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 forms">
            <div class="">
                <div class="w100">
                    <form class="form-row" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group col-lg-2">
                            <label for="title">Title</label>
                            <select name="title" id="title" class="form-control">
                                <option>--</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Prof.">Prof.</option>
                                <option value="Rev.">Rev.</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-5 {{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label for="fname" class="control-label">First Name *</label>

                            <div class="">
                                <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-lg-5">
                            <label for="lname">Last name *</label>
                            <input type="text" class="form-control" id="lname" name="lname" required>
                        </div>
                        <div class="form-group col-lg-8">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="city">City *</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="country">Country *</label>
                            <input type="text" class="form-control" id="country" name="country" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="phone">Phone *</label>
                            <input type="phone" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="col-lg-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>

                            <div class="">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password *</label>

                            <div class="">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <label for="password-confirm" class="control-label">Confirm Password *</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <label class="control-label">Are you travelling for Work?</label>
                        </div>

                        <div class="col-lg-2 d-flex">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="work" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="work" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <label class="control-label">Are you travelling for Travel?</label>
                        </div>

                        <div class="col-lg-2 d-flex">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="travel" id="inlineRadio3" value="1">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="travel" id="inlineRadio4" value="0">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="country">Who are you booking for? I am the main guest Booking is for someone else?</label>
                            <textarea class="form-control" rows="2" name="comment"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LddGL8ZAAAAAJTFAZZb_NTdpLJlr00uutLbovUs"></div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection