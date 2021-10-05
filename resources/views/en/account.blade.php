@extends('layouts.english')

@section('title', 'My Account')

@section('cssFiles')

@endsection 

@section('content')
<div id="about">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      </div>
      <div class="col-lg-4"></div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-12"><h1>{{ Auth::user()->title ?? '' }} {{ Auth::user()->name }} {{ Auth::user()->lname }}</h1></div>
    </div>
    <div class="row">
      <div class="col-sm-3"><!--left col-->          
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><a href="{{route('wishs')}}"><span class="pull-left"><strong>Wish Items</strong></span> {{ count(Auth::user()->getUserWish) }}</a></li>            
          </ul>          
      </div><!--/col-3-->
      <div class="col-sm-9">
              
        <form class="form-row" method="POST" action="{{ route('updateuser') }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

              <div class="form-group col-lg-2">
                  <label for="title">Title</label>
                  <select name="title" id="title" class="form-control">
                      <option>--</option>
                      <option value="Mr." {{ Auth::user()->title == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                      <option value="Mrs." {{ Auth::user()->title == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                      <option value="Dr." {{ Auth::user()->title == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                      <option value="Prof." {{ Auth::user()->title == 'Prof.' ? 'selected' : '' }}>Prof.</option>
                      <option value="Rev." {{ Auth::user()->title == 'Rev.' ? 'selected' : '' }}>Rev.</option>
                  </select>
              </div>

              <div class="form-group col-lg-5 {{ $errors->has('fname') ? ' has-error' : '' }}">
                  <label for="fname" class="control-label">First Name *</label>

                  <div class="">
                      <input id="fname" type="text" class="form-control" name="fname" value="{{ Auth::user()->name }}" required autofocus>

                      @if ($errors->has('fname'))
                          <span class="help-block">
                              <strong>{{ $errors->first('fname') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group col-lg-5">
                  <label for="lname">Last name *</label>
                  <input type="text" class="form-control" id="lname" value="{{ Auth::user()->lname }}" name="lname" required>
              </div>
              <div class="form-group col-lg-8">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}">
              </div>
              <div class="form-group col-lg-4">
                  <label for="city">City *</label>
                  <input type="text" class="form-control" id="city" name="city" value="{{ Auth::user()->city }}" required>
              </div>
              <div class="form-group col-lg-6">
                  <label for="country">Country *</label>
                  <input type="text" class="form-control" id="country" name="country" value="{{ Auth::user()->country }}" required>
              </div>
              <div class="form-group col-lg-6">
                  <label for="phone">Phone *</label>
                  <input type="phone" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}" required>
              </div>

              <div class="col-lg-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="control-label">E-Mail Address</label>

                  <div class="">
                      <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required disabled>

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="col-lg-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="control-label">Password</label>

                  <div class="">
                      <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="col-lg-6 form-group">
                  <label for="password-confirm" class="control-label">Confirm Password</label>

                  <div class="">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                  </div>
              </div>

              <div class="col-lg-8">
                  <label class="control-label">Are you travelling for Work?</label>
              </div>

              <div class="col-lg-2 d-flex">
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="work" id="inlineRadio1" value="1" {{ Auth::user()->work == '1' ? 'checked' : '' }}>
                      <label class="form-check-label" for="inlineRadio1">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="work" id="inlineRadio2" value="0" {{ Auth::user()->work == '0' ? 'checked' : '' }}>
                      <label class="form-check-label" for="inlineRadio2">No</label>
                  </div>
              </div>

              <div class="col-lg-8">
                  <label class="control-label">Are you travelling for Travel?</label>
              </div>

              <div class="col-lg-2 d-flex">
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="travel" id="inlineRadio3" value="1" {{ Auth::user()->travel == '1' ? 'checked' : '' }}>
                      <label class="form-check-label" for="inlineRadio1">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="travel" id="inlineRadio4" value="0" {{ Auth::user()->travel == '0' ? 'checked' : '' }}>
                      <label class="form-check-label" for="inlineRadio2">No</label>
                  </div>
              </div>

              <div class="form-group col-lg-12">
                  <label for="country">Who are you booking for? I am the main guest Booking is for someone else?</label>
                  <textarea class="form-control" rows="2" name="comment">{!! Auth::user()->comment !!}</textarea>
              </div>

              <div class="col-lg-12 form-group">
                  <button type="submit" class="btn btn-success">
                      Save
                  </button>
              </div>
        </form>
      </div><!--/col-9-->
    </div><!--/row-->
   

    </div>
  </div>
</div>
</div>
</div>
@endsection

@section('jsFiles')
<script type="text/javascript">
  @if (session('status'))
    $.notify("Your Account update Successfully.", "success");
  @endif
</script>
@endsection