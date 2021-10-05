@extends('layouts.english')

@section('title', 'Contact us')

@section('cssFiles')

@endsection 

@section('content')
<div id="about">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1>Contact us</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-5">
        <h2>Address</h2>
        <p>{{$site_content['address']}}</p>
        <h2>Phone</h2>
        <p>{{$site_content['tel']}}</p>
        <h2>Fax</h2>
        <p>{{$site_content['fax']}}</p>
        <h2>Mobile</h2>
        <p>{{$site_content['mob']}}</p>
        <h2>Email</h2>
        <p><a href="mailto:{{$site_content['email']}}">{{$site_content['email']}}</a></p>
        <h2>Opening Hours</h2>
        <p>{{$site_content['opening']}}</p>
      </div>
      <div class="col-lg-7">
        @if (Session::has('feedback'))
            @if (Session::get('feedback') == 'sucsses')
                <div class="alert alert-success alert-dismissible show" role="alert">
                  <strong>Your message has been received, we will answer you shortly</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @else
                <div class="alert alert-warning alert-dismissible show" role="alert">
                  <strong>Something went wrong please try again!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
        @else
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="forms">
        <form method="POST" action="{{route('feed')}}"> 
          {{csrf_field()}}
          <div class="form-row">
              <div class="form-group col-lg-6">
                <label for="name">Name *</label>
                <input type="name" class="form-control" name="name" id="name">
              </div>
              <div class="form-group col-lg-6">
                <label for="phone">Phone *</label>
                <input type="phone" class="form-control" id="phone" name="phone">
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-12">
                <label for="Email">Email *</label>
                <input type="email" class="form-control" id="Email" name="email">
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-12">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="client_message" rows="4"></textarea>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-12">
                <div class="g-recaptcha" data-sitekey="6LddGL8ZAAAAAJTFAZZb_NTdpLJlr00uutLbovUs"></div>
              </div>
          </div>
          <button class="btn btn-success" type="submit">Send</button>
        </form>       
        </div>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div id="map">         
          <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13815.933330265352!2d31.201301533249314!3d30.037336026838556!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145846ccece399d7%3A0xb4f3c5833965f888!2sMinerva+Tourism+Company!5e0!3m2!1sen!2seg!4v1524680756080" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('jsFiles')

@endsection