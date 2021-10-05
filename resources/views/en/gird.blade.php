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

<div id="grid">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{title_case(str_replace('-', ' ', $submenu))}}</h1>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-9">
        @if(count($items) > 0)
        <div class="row">          
          @foreach($items as $item)
          <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card">
              <a class="card-image" href="{{route('healthcare-child', ['$items' => $item->slug_category, '$item' => $item->slug ])}}"><img class="card-img-top" src="{{asset('images/healthcare/'. $item->logo )}}"></a>
              <div class="card-body">
                <h2 class="card-title">{{$item->name}}</h2>
                <p class="card-text">{!! str_limit(strip_tags($item->details), 150) !!}</p>                
              </div>
              <div class="card-footer">
                <a href="{{route('healthcare-child', ['$items' => $item->slug_category, '$item' => $item->slug ])}}" class="btn btn-outline-primary"><i class="fa fa-info-circle"></i> More Details</a>                
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#EmailToFriend" data-whatever="{{route('healthcare-child', ['$items' => $item->slug_category, '$item' => $item->slug ])}}"><i class="fa fa-envelope-square"></i> Send to a friend</button>
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

@section('jsFiles')
<script type="text/javascript">
  $('#logo').attr('src', "{{asset('/images/minerva-health-care.jpg')}}");
</script>
@endsection