@if(count($last)> 0)
<div id="lastNews">
  <h4>Lastest News</h4>
  <ul>
    @foreach($last as $one)
    @isset($one)    
    <li>
      <div class="image">
        <a href="{{route('item', [$one->category_slug, $one->sub_category_slug,$one->dataItem->where('languagecode', 'en')->first()->name_slug ])}}"><img class="w-100" src="{{asset('images/items/'. $one->logo)}}"></a>
      </div>
      <div class="title">
        <p><a href="{{route('item', [$one->category_slug, $one->sub_category_slug,$one->dataItem->where('languagecode', 'en')->first()->name_slug ])}}">{{ $one->dataItem->where('languagecode', 'en')->first()->name }}</a>
          @if(@$one->category)
            <br/> <small>{{$one->category}}</small>
          @endif
        </p>
      </div>
      <hr/>
    </li>
    @endisset
    @endforeach
  </ul>
</div>
@endif