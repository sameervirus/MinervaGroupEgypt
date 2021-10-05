<div id="subMenu">
  <ul class="nav nav-fill">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Shanda Lodge</a>
        <div class="dropdown-menu">
          <a class="dropdown-item{{$submenu == str_slug('About us') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('About us')])}}">About us</a>
          <a class="dropdown-item{{$submenu == str_slug('Hotel Rates') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Hotel Rates')])}}">Hotel Rates</a>
          <a class="dropdown-item{{$submenu == str_slug('Location') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Location')])}}">Location</a>
          <a class="dropdown-item{{$submenu == str_slug('How to reach there') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('How to reach there')])}}">How to reach there</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Facilities</a>
        <div class="dropdown-menu">
          <a class="dropdown-item{{$submenu == str_slug('Reception') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Reception')])}}">Reception</a>
          <a class="dropdown-item{{$submenu == str_slug('Lounges') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Lounges')])}}">Lounges</a>
          <a class="dropdown-item{{$submenu == str_slug('Restaurants') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Restaurants')])}}">Restaurants</a>
          <a class="dropdown-item{{$submenu == str_slug('Spa & Wellness') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Spa & Wellness')])}}">Spa & Wellness</a>
          <a class="dropdown-item{{$submenu == str_slug('Pool') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Pool')])}}">Pool</a>
          <a class="dropdown-item{{$submenu == str_slug('Rooms') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Rooms')])}}">Rooms</a>          
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Attractions</a>
        <div class="dropdown-menu">
          <a class="dropdown-item{{$submenu == str_slug('Nature') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Nature')])}}">Nature</a> 
          <a class="dropdown-item{{$submenu == str_slug('History') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('History')])}}">History</a> 
          <a class="dropdown-item{{$submenu == str_slug('Archeology') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Archeology')])}}">Archeology</a> 
          <a class="dropdown-item{{$submenu == str_slug('Architecture') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Architecture')])}}">Architecture</a> 
          <a class="dropdown-item{{$submenu == str_slug('Flora & fauna') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Flora & fauna')])}}">Flora & fauna</a>       
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Activities</a>
        <div class="dropdown-menu">
          <a class="dropdown-item{{$submenu == str_slug('Culture Tours') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Culture Tours')])}}">Culture Tours</a> 
          <a class="dropdown-item{{$submenu == str_slug('Camel Rides & Trekking') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Camel Rides & Trekking')])}}">Camel Rides & Trekking</a> 
          <a class="dropdown-item{{$submenu == str_slug('Desert Safari') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Desert Safari')])}}">Desert Safari</a> 
          <a class="dropdown-item{{$submenu == str_slug('Yoga & Meditation') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Yoga & Meditation')])}}">Yoga & Meditation</a> 
          <a class="dropdown-item{{$submenu == str_slug('Sand boarding') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Sand boarding')])}}">Sand boarding</a> 
          <a class="dropdown-item{{$submenu == str_slug('Stargazing') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Stargazing')])}}">Stargazing</a> 
          <a class="dropdown-item{{$submenu == str_slug('Bedouin Night') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Bedouin Night')])}}">Bedouin Night</a> 
          <a class="dropdown-item{{$submenu == str_slug('Hot Spring') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Hot Spring')])}}">Hot Spring</a>  
          <a class="dropdown-item{{$submenu == str_slug('Wellness & Recovery') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Wellness & Recovery')])}}">Wellness & Recovery</a>  
          <a class="dropdown-item{{$submenu == str_slug('Bird watching') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 's', 'item' => str_slug('Bird watching')])}}">Bird watching</a>        
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sightseeing</a>
        <div class="dropdown-menu">
          <a class="dropdown-item{{$submenu == str_slug('Dakhla Oasis') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Dakhla Oasis')])}}">Dakhla Oasis</a>
          <a class="dropdown-item{{$submenu == str_slug('Kharga Oasis') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Kharga Oasis')])}}">Kharga Oasis</a>
          <a class="dropdown-item{{$submenu == str_slug('Farafra Oasis') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Farafra Oasis')])}}">Farafra Oasis</a>       
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Eco Projects') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Eco Projects')])}}">Eco Projects</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Programs') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Programs')])}}">Programs</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Special Offers') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Special Offers')])}}">Special Offers</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Events') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Events')])}}">Events</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Gallery') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Gallery')])}}">Gallery</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Videos') ? ' active':''}}" href="{{route('shandalodge' , ['layout' => 'g', 'item' => str_slug('Videos')])}}">Videos</a>
    </li>    
  </ul>
</div>
<div class="clearfix"></div> 