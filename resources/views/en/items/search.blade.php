@extends('layouts.english')

@section('title', 'Search Result for' . $q)

@section('cssFiles')
<style type="text/css">
  #shadow .div-height {height: 0!important;}
</style>
@endsection 

@section('content')

<div id="list">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9">
        <p style="margin-top: 20px;">About {{ $items->total() }} results</p>
        <div id="posts">          
          @if(count($items) > 0)
          @foreach($items as $item)
          <div class="post">
            @php $checked = in_array($item->id, $wishlist) ? 'true' : 'false' @endphp
            @include('parts.wishButton',['val' => $item->id, 'checked' => $checked ])
            <div class="details">
              <a href="{{route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug])}}">
              <h2>{{ $item->dataItem->where('languagecode', $lang)->first()->name }}</h2>
              </a>
              <p style="color: green">{{str_limit(route('item' , [$item->category_slug,$item->sub_category_slug,$item->dataItem->where('languagecode', $lang)->first()->name_slug]), 100)}}</p>
              <p>{!! str_limit(strip_tags($item->dataItem->where('languagecode', $lang)->first()->short_description ?? $item->dataItem->where('languagecode', $lang)->first()->description), 150) !!}</p>

            </div>
          </div>
          @endforeach
          @else
            <h2>No item for your search</h2> 
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