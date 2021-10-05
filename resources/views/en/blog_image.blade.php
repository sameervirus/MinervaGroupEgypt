@extends('layouts.english')

@section('title', $item->name)

@section('logo', asset("/images/" . $site_content['healthcare']))

@section('cssFiles')
<style type="text/css">
  #shadow .div-height {height: 0!important;}
</style>
@endsection 

@section('content')

@include('en.includes.submenu')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('healthcare' , $item->slug_category)}}">{{$item->category}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$item->name}}</li>
  </ol>
</nav>

<div id="imageBlog">  
  <div class="container-fluid">
    <h3>{{$item->name}}</h3>
    <div class="row">
      <div class="col-lg-9">        
        <div class="post row">
          <div class="col-lg-12">
            <div class="image"><img src="{{asset('images/healthcare/'. $item->logo)}}"></div>
          </div>
          @if($item->details)
          <div class="clearfix"></div>
          <div class="details col-lg-12">
            <h3>{{$item->category}} Details</h3>
            {!! $item->details !!}
          </div>
          @endif
          @if($item->images)
          <div class="clearfix"></div>
          <div class="images col-lg-12">
            <h3>{{$item->category}} Picture</h3>

            @foreach(array_chunk(explode('|', $item->images),4) as $chunk)
            <div class="card-group">
              
              @foreach($chunk as $image)
              <div class="card">
                <a class="fancybox" rel="group" href="{{url('images/healthcare/'. $image)}}">
                <img class="card-img-top" src="{{asset('images/healthcare/'. $image)}}" alt="{{$item->name}}"></a>
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
@endsection

@section('jsFiles')
<script type="text/javascript">
  $('#logo').attr('src', "{{asset('/images/minerva-health-care.jpg')}}");
  $(document).ready(function() {
    $(".fancybox").fancybox();
  });
</script>
@endsection