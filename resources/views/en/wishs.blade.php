@extends('layouts.english')

@section('title', 'My Account')

@section('cssFiles')

@endsection 

@section('content')
<div id="about">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      </div>
      <div class="col-lg-4"></div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-12"><h1>Wishlist</h1></div>
    </div>
    <div class="row">
      <div class="col-sm-3"><!--left col-->          
          <ul class="list-group">
            <li class="list-group-item text-muted">Account Info <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Name:</strong></span> {{ Auth::user()->title ?? '' }} {{ Auth::user()->name }} {{ Auth::user()->lname }}</li> 
            <li class="list-group-item text-right"><span class="pull-left"><strong>Email:</strong></span> {{ Auth::user()->email }}</li>            
          </ul>          
      </div><!--/col-3-->
      <div id="list" class="col-sm-9" style="background-color: #fff;">
          <p style="margin-top: 20px;">You have {{ $items->total() }} wish items</p>
          <div id="posts">          
            @if(count($items) > 0)
            @foreach($items as $item)
            <div class="post">
              @include('parts.wishButton',['val' => $item->id, 'checked' => 'true' ])
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

      </div><!--/col-9-->
    </div><!--/row-->
   

    </div>
  </div>
</div>
</div>
</div>
@endsection

@section('jsFiles')
<script type="text/javascript">
  @if (session('status'))
    $.notify("Your Account update Successfully.", "success");
  @endif
</script>
@endsection