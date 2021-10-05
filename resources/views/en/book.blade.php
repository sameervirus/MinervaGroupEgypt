@extends('layouts.english')

@section('title', 'Payment')

@section('cssFiles')

@endsection 

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div id="about">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1>Booking</h1>

        <h3>Book details</h3>
        <div>
          <table class="table">
            <tr><th>Item name</th><td>{{ $itemData->name }}</td></tr>
            <tr><th>Item Price</th><td>{{ $item->price }} {{ $item->currency->name ?? '' }}<br />
                            Price by Egypt currency {{ $item->egpPrice }}</td></tr>
            <tr><th>Item Duration</th><td>{{ $itemData->duration }}</td></tr>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
            
        <div class="forms">
        <form method="POST" action="{{route('book', $item->id)}}"> 
          {{csrf_field()}}
          <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? ''}}">
          <div class="form-row">
              <div class="form-group col-lg-6">
                <label for="firstname">Name *</label>
                <input type="text" class="form-control" name="firstname" id="firstname" value="{{ Auth::user()->name ?? ''}}">
              </div>
              <div class="form-group col-lg-6">
                <label for="lastname">Name *</label>
                <input type="text" class="form-control" name="lastname" id="lastname" value="{{  Auth::user()->lname ?? ''}}">
              </div>              
          </div>
          <div class="form-row">
            <div class="form-group col-lg-12">
                <label for="Email">Email *</label>
                <input type="email" class="form-control" id="Email" name="email" value="{{ Auth::user()->email ?? ''}}">
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-lg-6">
                <label for="phone">Phone *</label>
                <input type="phone" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone ?? ''}}">
              </div>
              <div class="form-group col-lg-6">
                <label for="travels">Numbers of travels</label>
                <input type="text" class="form-control" id="travels" name="travels" value="" required>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-12">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="client_message" rows="4"></textarea>
              </div>
          </div>
          <button class="btn btn-success" type="submit">Pay Now</button>
        </form>       
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('jsFiles')

@endsection