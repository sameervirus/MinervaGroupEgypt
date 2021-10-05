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
          <div class="flex-card flex-listing activity-tile cols-md has-link">
            <div class="flex-figure">
                <figure class="image aspect-ratio16-9" data-src="{{asset('images/items/'. $item->logo )}}" data-alt="{{$item->name}}"><img src="{{asset('images/items/'. $item->logo )}}" alt="{{$item->name}}" class="tile-media"></figure>
            </div>
            <div class="flex-content">
                <div class="flex-area-primary">
                    <div class="primary-content">
                        <h3 class="tile-name link withSupplier"><a href="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}">{{$item->dataItem->where('languagecode', $lang)->first()->name}}</a></h3>
                        <p class="tile-proximity-message expanded-search-false"> {{$item->dataItem->where('languagecode', $lang)->first()->location ?? ''}} </p>
                        <p class="activity-hotel-distance"></p>
                        
                        @isset($item->dataItem->where('languagecode', $lang)->first()->duration)
                        <p class="col col-md-6 tile-duration review-score "><span id="activityDuration549541" class="tile-activity-duration"><span class="fa fa-clock-o" aria-hidden="true"></span><span class="alt">Duration</span> {{$item->dataItem->where('languagecode', $lang)->first()->duration ?? ''}} </span>
                        </p>
                        @endisset

                        <div class="col col-md-12 tile-short-description">
                            {!! str_limit(strip_tags($item->dataItem->where('languagecode', $lang)->first()->short_description ?? $item->dataItem->where('languagecode', $lang)->first()->description), 150) !!}
                        </div>

                        <div class="col col-md-12 tile-short-description">
                            <a href="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}"><button type="button" class="btn btn-outline-primary"><i class="fa fa-info-circle"></i> More Details</button></a>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#EmailToFriend" data-whatever="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}"><i class="fa fa-envelope-square"></i> Send to a friend</button>
                        </div>
                    </div>
                    <div class="primary-content-slim">
                        <div class="tile-name-container ">
                            <h6 class="tile-name link">{{$item->dataItem->where('languagecode', $lang)->first()->name}}</h6></div>
                        <p class="tile-proximity-message expanded-search-false"> {{$item->dataItem->where('languagecode', $lang)->first()->location ?? ''}} </p>

                        @isset($item->dataItem->where('languagecode', $lang)->first()->duration)
                        <p class="activity-content cf review-visible"><span id="activityDuration549541" class="tile-activity-duration"><span class="fa fa-clock-o" aria-hidden="true"></span><span class="alt">Duration</span> {{$item->dataItem->where('languagecode', $lang)->first()->location ?? ''}} </span>
                        </p>
                        @endisset

                        <div class="col col-md-12 tile-short-description">
                            {!! str_limit(strip_tags($item->dataItem->where('languagecode', $lang)->first()->short_description ?? $item->dataItem->where('languagecode', $lang)->first()->description), 150) !!}
                        </div>

                        @isset($item->dataItem->where('languagecode', $lang)->first()->price)
                        <p class="col col-md-6 tile-price prominence"><span class="activityFromPrice"><span id="activityFromPriceTicketType549541" class="ticket-type" style="margin-right: 0.5em;">per traveler * </span><strong aria-hidden="true" class="strong-reviewed "><span aria-hidden="true" class="price"> {{ $item->dataItem->where('languagecode', $lang)->first()->price }} </span></strong></span>
                        </p>
                        @endisset

                    </div>
                </div>
                <div class="flex-area-secondary">
                  @php $checked = in_array($item->id, $wishlist) ? 'true' : 'false' @endphp
                  @include('parts.wishButton',['val' => $item->id, 'checked' => $checked ])
                  @isset($item->dataItem->where('languagecode', $lang)->first()->price)
                    <p class="tile-price prominence tile-price-grey"><span class="activityFromPriceReviewed"><strong aria-hidden="true" class="">{{ $item->dataItem->where('languagecode', $lang)->first()->price }}</strong></span><span> per traveler*</span></p>
                  @endisset
                </div>
            </div>
            {{-- <a class="flex-link" href=""></a> --}}
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