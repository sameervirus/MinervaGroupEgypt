@extends('layouts.english')

@section('title', 'Payment Done')

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
      <div class="col-lg-6 offset-lg-3">
        <h1>Booking</h1>

        <h3>Book details</h3>
        <div>
          <table class="table">
            <tr><th>Item name</th><td>{{ $order->item->dataItem->first()->name }}</td></tr>
            <tr><th>Item Price</th><td>{{ $order->item->price }}</td></tr>
            <tr><th>Item Duration</th><td>{{ $order->item->dataItem->first()->duration }}</td></tr>
            <tr><th>Payment Amount</th><td>{{ $data['amount_cents'] / 100 }} {{ $data['currency'] }}</td></tr>
            <tr><td colspan="2" class="text-center">Thank you for payment will send you an email with all details</td></tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('jsFiles')

@endsection