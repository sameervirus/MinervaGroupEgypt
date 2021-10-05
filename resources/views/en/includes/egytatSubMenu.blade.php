<div id="subMenu">
  <ul class="nav nav-fill">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Egytat</a>
        <div class="dropdown-menu">
          <a class="dropdown-item{{$submenu == str_slug('About us') ? ' active':''}}" href="{{route('egytat' , ['layout' => 's', 'item' => str_slug('About us')])}}">About us</a>
          <a class="dropdown-item{{$submenu == str_slug('Our Vision') ? ' active':''}}" href="{{route('egytat' , ['layout' => 's', 'item' => str_slug('Our Vision')])}}">Our Vision</a>
          <a class="dropdown-item{{$submenu == str_slug('Our Mission') ? ' active':''}}" href="{{route('egytat' , ['layout' => 's', 'item' => str_slug('Our Mission')])}}">Our Mission</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Products') ? ' active':''}}" href="{{route('egytat' , ['layout' => 'g', 'item' => str_slug('Products')])}}">Products</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Gallery') ? ' active':''}}" href="{{route('egytat' , ['layout' => 'g', 'item' => str_slug('Gallery')])}}">Gallery</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Services') ? ' active':''}}" href="{{route('egytat' , ['layout' => 'g', 'item' => str_slug('Services')])}}">Services</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('News') ? ' active':''}}" href="{{route('egytat' , ['layout' => 'g', 'item' => str_slug('News')])}}">News</a>
    </li>    
  </ul>
</div>
<div class="clearfix"></div> 