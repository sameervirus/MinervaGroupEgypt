@extends('layouts.english')

@section('title', $dataItem->name ?? '')

@section('logo', asset("/images/" . $subdata['logo']))

@section('cssFiles')
<style type="text/css">
  #shadow .div-height {height: 0!important;}
</style>
@if($page == 'shanda-lodge')
<script async src="https://reservation.booking.expert/embed/calendar.js?h=ccjeee" data-booking-calendar></script>
@endif
@endsection 

@section('content')

{!! $submenu !!}
@if(count ($item) > 0)
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('company' , [$item->category_slug, $item->sub_category_slug])}}">{{$item->sub_category}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$dataItem->name}}</li>
  </ol>
</nav>

<div id="imageBlog">  
  <div class="container-fluid">
    <h3>{{$dataItem->name}}</h3>
    <div class="row">
      <div class="col-lg-9">        
        <div class="post row">
          @php $checked = in_array($item->id, $wishlist) ? 'true' : 'false' @endphp
          @include('parts.wishButton',['val' => $item->id, 'checked' => $checked ])
          <div class="col-lg-12">
            <div class="image"><img src="{{asset('images/items/'. $item->logo)}}"></div>
            @php $lang = @$_GET['lang'] ? $_GET['lang'] : 'en'; @endphp 
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#EmailToFriend" data-whatever="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}"><i class="fa fa-envelope-square"></i> Send to a friend</button>
          </div>
          @if($dataItem->description)
          <div class="clearfix"></div>
          <div class="details col-lg-12">
            <h3>{{ $dataItem->name }} Details</h3>
            {!! $dataItem->description !!}
          </div>
          @endif
          @if($item->images)
          <div class="clearfix"></div>
          <div class="images col-lg-12">
            <h3>Gallery</h3>

            @foreach(array_chunk(explode('|', $item->images),4) as $chunk)
            <div class="card-group">
              
              @foreach($chunk as $image)
              <div class="card">
                <a class="fancybox" rel="group" href="{{url('images/items/'. $image)}}">
                <img class="card-img-top" src="{{asset('images/items/'. $image)}}" alt="{{$item->name}}"></a>
              </div>
              @endforeach
                   
            </div>
            @endforeach

          </div>
          @endif          
        </div>
      </div>
      <div class="col-lg-3">
        @include('en.includes.sidebar')
      </div>
    </div>
  </div>
</div>
@else

<h1>No item to Display</h1>

@endif
@endsection

@section('jsFiles')
<script type="text/javascript">
  $(document).ready(function() {
    $(".fancybox").fancybox();
  });
</script>
@endsection