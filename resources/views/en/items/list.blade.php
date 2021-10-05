@extends('layouts.english')

@section('title', title_case(str_replace('-', ' ', $items[0]->sub_category)))

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

<div id="list">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ $items[0]->sub_category }}</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-9">
        <div id="posts">
          @if(count($items) > 0)
          @foreach($items as $item)
          <div class="post">
            @php $checked = in_array($item->id, $wishlist) ? 'true' : 'false' @endphp
            @include('parts.wishButton',['val' => $item->id, 'checked' => $checked ])
            <div class="image">
              <a href="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}"><img src="{{asset('images/items/'. $item->logo)}}"></a></div>
            <div class="details">
              <h2>{{ $item->dataItem->where('languagecode', $lang)->first()->name }}</h2>
              <p>{!! str_limit(strip_tags($item->dataItem->where('languagecode', $lang)->first()->short_description ?? $item->dataItem->where('languagecode', $lang)->first()->description), 150) !!}</p>
              <div class="post-footer">
                <a href="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}"><button type="button" class="btn btn-outline-primary"><i class="fa fa-info-circle"></i> More Details</button></a>
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#EmailToFriend" data-whatever="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}"><i class="fa fa-envelope-square"></i> Send to a friend</button>
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