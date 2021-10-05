@if(count($last)> 0)
<div id="lastNews">
  <h4>Lastest News</h4>
  <ul>
    @foreach($last as $one)
    <li>
      <div class="image">
        <a href="{{route('shandalodge' , ['layout' => 'i', 'item' => $one->slug ])}}"><img class="w-100" src="{{asset('images/shandalodge/'. $one->logo)}}"></a>
      </div>
      <div class="title">
        <p>
          <a href="{{route('shandalodge' , ['layout' => 'i', 'item' => $one->slug ])}}">{{ $one->name }}</a>
          @if(@$one->category)
            <br/> <small>{{$one->category}}</small>
          @endif
        </p>
      </div>
      <hr/>
    </li>
    @endforeach
  </ul>
</div>
@endif