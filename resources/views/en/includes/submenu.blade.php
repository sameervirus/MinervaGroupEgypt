<div id="subMenu">
  <ul class="nav nav-fill">
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('hospitals') ? ' active':''}}" href="{{route('healthcare' , str_slug('hospitals'))}}">Hospitals</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Medical Centers') ? ' active':''}}" href="{{route('healthcare' , str_slug('Medical Centers'))}}">Medical Centers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Doctors') ? ' active':''}}" href="{{route('healthcare' , str_slug('Doctors'))}}">Doctors</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Packages') ? ' active':''}}" href="{{route('healthcare' , str_slug('Packages'))}}">Packages</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Treatment') ? ' active':''}}" href="{{route('healthcare' , str_slug('Treatment'))}}">Treatment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('lectures & Training Programs') ? ' active':''}}" href="{{route('healthcare' , str_slug('lectures & Training Programs'))}}">lectures & Training Programs</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Videos') ? ' active':''}}" href="{{route('healthcare' , str_slug('Videos'))}}">Videos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('News') ? ' active':''}}" href="{{route('healthcare' , str_slug('News'))}}">News</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Events') ? ' active':''}}" href="{{route('healthcare' , str_slug('Events'))}}">Events</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Articles') ? ' active':''}}" href="{{route('healthcare' , str_slug('Articles'))}}">Articles</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('FAQS') ? ' active':''}}" href="{{route('healthcare' , str_slug('FAQS'))}}">FAQS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Plan Your Trip') ? ' active':''}}" href="{{route('healthcare' , str_slug('Plan Your Trip'))}}">Plan Your Trip</a>
    </li> 
  </ul>
</div>
<div class="clearfix"></div> 