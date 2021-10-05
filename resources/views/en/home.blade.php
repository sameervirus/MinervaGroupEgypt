@extends('layouts.english')

@section('title', 'Home Page')

@section('cssFiles')
<style type="text/css">
  html, body {height: 100%;margin: 0}
  .box {display: flex;flex-flow: column;height: 100%;}
  .box header {flex: 0 1 auto;}
  .box content {flex: 1 1 auto;overflow: hidden;}
  .box footer {flex: 0 1 40px;}
  #shadow .div-height {height: 0!important;}
</style>
@endsection 

@section('content')
<div id="slider">
  <div id="jobCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @foreach ($slider as $slide)
      <li data-target="#jobCarousel" data-slide-to="{{$loop->index}}" {{$loop->index == 0 ? 'class="active"':''}}></li>
      @endforeach
    </ol>
    <div class="carousel-inner">
      @foreach ($slider as $slide)
      <div class="carousel-item{{$loop->index == 0 ? ' active':''}}">
        <a href="#{{url('job/'. $slide->id .'-'. str_replace(' ','-',preg_replace('/[^\w\s]+/u','' ,$slide->header)) )}}">
        <img class="d-block w-100" src="{{asset('images/slider/'. $slide->image )}}" alt="{{ $slide->header or '' }}"></a>
      </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#jobCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#jobCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
@endsection

@section('jsFiles')

@endsection