@extends('layouts.english')

@section('title', @$dataItem->name)

@section('logo', asset("/images/" . $subdata['logo']))

@section('cssFiles')
<link rel="stylesheet" type="text/css" href="{{asset('css/swiper.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
@if($page == 'shanda-lodge')
<script async src="https://reservation.booking.expert/embed/calendar.js?h=ccjeee" data-booking-calendar></script>
@endif
@endsection 

@section('content')

{!! $submenu !!}
@if(count($item) > 0)
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('company' , [$item->category_slug, $item->sub_category_slug])}}">{{$item->sub_category}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$dataItem->name}}</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-9">        
<section class="activity-infosite activity">
    <div id="image-price-info">
        <div class="title-price-container">
            <div class="long-title fromLeadPrice dont-wrap-long-title">
                <h1 id="activityTitle" class="section-header-main">{{$dataItem->name}}</h1>
                @isset($dataItem->location)
                <span class="section-header-sec duration"> 
                    <span id="activitySupplierName" class="activitySupplier">Locations: {{$dataItem->location}}</span>
                </span>
                @endisset
            </div>
            <div class="tile-price fromLeadPrice width-tile-price">
                <div class="price-label fromLeadPrice redesign">                    
                    @isset($item->book_url)
                    <div class="avail-button-bpg">
                        <div>                            
                            <a href="{{$item->book_url}}" class="btn btn-secondary btn-action offerAddButtonAtf" id="offerAddButtonAtf"><span class="btn-label"><span class="lx-btn-text"> Book now </span></span>
                            </a>
                        </div>
                    </div>
                    @endisset
                    
                    @php $checked = in_array($item->id, $wishlist) ? 'true' : 'false' @endphp
                    @include('parts.wishButton',['val' => $item->id, 'checked' => $checked ])
                    @if(count($subdata['languages']) > 1)
                    <hr/>
                    <div class="languages">
                        @foreach($subdata['languages'] as $langs)
                            @if($langs == 'en')
                                <div class="lang"><a href="?lang=en"><span class="flag-icon flag-icon-us"></span> English</a></div>
                            @endif
                            @if($langs == 'es')
                                <div class="lang"><a href="?lang=es"><span class="flag-icon flag-icon-es"></span> Español</a></div>
                            @endif
                            @if($langs == 'de')
                                <div class="lang"><a href="?lang=de"><span class="flag-icon flag-icon-de"></span> Dutch</a></div>
                            @endif
                            @if($langs == 'fr')
                                <div class="lang"><a href="?lang=fr"><span class="flag-icon flag-icon-fr"></span> French</a></div>
                            @endif
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class=" cols-md cf page-blk">
            <div class="col col-md-6 infosite-image-gallery redesign original-aspect-ratio">
              <!-- Swiper -->
              <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                  <div class="swiper-slide" style="background-image:url({{asset('images/items/'. $item->logo)}})"></div>
                  @isset($item->images)
                  @foreach(explode('|', $item->images) as $image)
                  <div class="swiper-slide" style="background-image:url({{asset('images/items/'. $image)}})"></div>
                  @endforeach
                  @endisset
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
              </div>
              @isset($item->images)
              <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                  <div class="swiper-slide" style="background-image:url({{asset('images/items/'. $item->logo)}})"></div>
                  
                  @foreach(explode('|', $item->images) as $image)
                  <div class="swiper-slide" style="background-image:url({{asset('images/items/'. $image)}})"></div>
                  @endforeach
                  
                </div>
              </div>
              @endisset              
            </div>
            <div class="col col-md-6 infosite-details">
                <table class="table table-bordered">
                    @isset($item->price)
                    <tr>
                        <th width="25%">Price {{ $item->currency->name ?? '' }}:</th>
                        <td>
                            {{$item->price}}
                            <br />
                            Price by Egypt currency {{ $item->egpPrice }}
                        </td>
                    </tr>
                    @endisset
                    
                    @isset($dataItem->duration)
                    <tr>
                        <th width="25%">Duration:</th>
                        <td>{{$dataItem->duration}}</td>
                    </tr>
                    @endisset
                    
                    @isset($dataItem->highlights)
                    <tr>
                        <th width="25%">Highlights:</th>
                        <td>{!! $dataItem->highlights !!}</td>
                    </tr>
                    @endisset

                    @isset($item->price)
                    <tr>
                        <td colspan="2">
                            <a href="{{route('booknow', $item->id)}}" class="btn btn-success">Book Now</a>
                            @php $lang = @$_GET['lang'] ? $_GET['lang'] : 'en'; @endphp 
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#EmailToFriend" data-whatever="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}"><i class="fa fa-envelope-square"></i> Send to a friend</button>
                        </td>
                    </tr>
                    @endisset
                </table>

            </div>
        </div>
    </div>
    <div class="clearfix">
        <div id="activity-description" class="activity-desc">
            <div class="cols-md cf">
                <div id="descriptionContent">
                    
                    @isset($dataItem->description)
                    <hr>
                    <h3 class="section-title">Description</h3>
                    <div id="descriptionReplacehighlights" class="bullets padding-left-for-non-bex-site">
                        {!! $dataItem->description !!}
                    </div>
                    @endisset

                    @isset($dataItem->day_by_day)
                    <hr>
                    <h3 class="section-title">Day by day</h3>
                    {!! $dataItem->day_by_day !!}
                    @endisset

                    @isset($dataItem->inclusions)
                    <hr>
                    <h3 class="section-title">Inclusions</h3>
                    {!! $dataItem->inclusions !!}
                    @endisset

                    @isset($dataItem->exclusions)
                    <hr>
                    <h3 class="section-title">Exclusions</h3>
                    {!! $dataItem->exclusions !!}
                    @endisset

                    @isset($dataItem->details)
                    <hr>
                    <h3 class="section-title">Details</h3>
                    {!! $dataItem->details !!}
                    @endisset

                    @isset($dataItem->flights_transport)
                    <hr>
                    <h3 class="section-title">Flights Transport</h3>
                    {!! $dataItem->flights_transport !!}
                    @endisset

                    @isset($dataItem->group_size)
                    <hr>
                    <h3 class="section-title">Group Size</h3>
                    {!! $dataItem->group_size !!}
                    @endisset

                    @isset($dataItem->accommodations)
                    <hr>
                    <h3 class="section-title">Accommodations</h3>
                    {!! $dataItem->accommodations !!}
                    @endisset

                    @isset($dataItem->cancellation_policy)
                    <hr>
                    <h3 class="section-title">Cancellation Policy</h3>
                    {!! $dataItem->cancellation_policy !!}
                    @endisset

                    @isset($dataItem->additional_info)
                    <hr>
                    <h3 class="section-title">Additional Info</h3>
                    {!! $dataItem->additional_info !!}
                    @endisset

                    @isset($dataItem->know_before_book)
                    <hr>
                    <h3 class="section-title">Know Before You Book</h3>
                    {!! $dataItem->know_before_book !!}
                    @endisset
                </div>
            </div>
        </div>
    </div>
</section>
      </div>
      <div class="col-lg-3">
        <div>Share: <div id="shareBlock"></div> </div>
        @include('en.includes.sidebar')
      </div>
  </div>
</div>
@else

<h1>No item to Display</h1>

@endif
@endsection

@section('jsFiles')
<!-- Swiper JS -->
<script src="{{asset('js/swiper.min.js')}}"></script>
<!-- Initialize Swiper -->
<script>
  var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });
  var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: galleryThumbs
    }
  });
  $(function(){
    $('.selectpicker').selectpicker();
  });
</script>
@endsection