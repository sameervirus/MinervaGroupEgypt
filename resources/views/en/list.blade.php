@extends('layouts.english')

@section('title', title_case(str_replace('-', ' ', $submenu)))

@section('logo', asset("/images/" . $site_content['healthcare']))

@section('cssFiles')
<style type="text/css">
  #shadow .div-height {height: 0!important;}
</style>
@endsection 

@section('content')

@include('en.includes.submenu')

<div id="list">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ $items[0]->Category or title_case(str_replace('-', ' ', $submenu))}}</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-9">
        <div id="posts">
          @if(count($items) > 0)
          @foreach($items as $item)
          <div class="post">
            <div class="image">
              <a href="{{route('healthcare-child', ['$items' => $item->slug_category, '$item' => $item->slug ])}}"><img src="{{asset('images/healthcare/'. $item->logo)}}"></a></div>
            <div class="details">
              <h2>{{$item->name}}</h2>
              <p>{!! str_limit(strip_tags($item->details), 400) !!}</p>
              <div class="post-footer">
                <a href="{{route('healthcare-child', ['$items' => $item->slug_category, '$item' => $item->slug ])}}"><button type="button" class="btn btn-outline-primary"><i class="fa fa-info-circle"></i> More Details</button></a>
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#EmailToFriend" data-whatever="{{route('healthcare-child', ['$items' => $item->slug_category, '$item' => $item->slug ])}}"><i class="fa fa-envelope-square"></i> Send to a friend</button>
              </div>
            </div>
          </div>
          @endforeach
          @else
            <h2>No item for this Category</h2> 
          @endif
        </div>
        <div class="">
          <div class="pagination-div">
            {{ $items->links() }}
          </div>
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
</script>
@endsection