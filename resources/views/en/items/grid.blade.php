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

<div id="grid">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{title_case(str_replace('-', ' ', $items[0]->sub_category))}}</h1>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-9">
        @if(count($items) > 0)
        <div class="row">          
          @foreach($items as $item)
          <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card">
              @php $checked = in_array($item->id, $wishlist) ? 'true' : 'false' @endphp
              @include('parts.wishButton',['val' => $item->id, 'checked' => $checked ])
              <a class="card-image" href="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}"><img class="card-img-top" src="{{asset('images/items/'. $item->logo )}}"></a>
              <div class="card-body">
                <h2 class="card-title">{{ $item->dataItem->where('languagecode', $lang)->first()->name }}</h2>
                <p class="card-text">{!! str_limit(strip_tags($item->dataItem->where('languagecode', $lang)->first()->short_description ?? $item->dataItem->where('languagecode', $lang)->first()->description), 150) !!}</p>                
              </div>
              <div class="card-footer">
                <a href="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}" class="btn btn-outline-primary"><i class="fa fa-info-circle"></i> More Details</a>
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#EmailToFriend" data-whatever="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}"><i class="fa fa-envelope-square"></i> Send to a friend</button>

              </div>
            </div>
          </div>
          @endforeach
          
        </div>
        <div class="row">
          <div class="pagination-div">
            {{ $items->links() }}
          </div>
        </div>

        @else
        <div class="row">
          <div class="col-lg-12">
            <h2>No item for this Category</h2>
          </div>
        </div>
        @endif
      </div>
      <div class="col-lg-3">
        @include('en.includes.sidebar')
      </div>
    </div>
  </div>
</div>
@endsection