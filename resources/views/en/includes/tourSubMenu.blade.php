<div id="subMenu">
  <ul class="nav nav-fill">
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Company Profile') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 's', 'item' => str_slug('Company Profile')])}}">Company Profile</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">EGYPT ALA CARTE</a>
        <div class="dropdown-menu">
          <a class="dropdown-item{{$submenu == str_slug('Cairo') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Cairo')])}}">Cairo</a>
          <a class="dropdown-item{{$submenu == str_slug('Alexandria') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Alexandria')])}}">Alexandria</a>
          <a class="dropdown-item{{$submenu == str_slug('Sharm El Shiekh') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Sharm El Shiekh')])}}">Sharm El Shiekh</a>
          <a class="dropdown-item{{$submenu == str_slug('Hurghada') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Hurghada')])}}">Hurghada</a>
          <a class="dropdown-item{{$submenu == str_slug('Ain El Sokhna') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Ain El Sokhna')])}}">Ain El Sokhna</a>
          <a class="dropdown-item{{$submenu == str_slug('New Valley') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('New Valley')])}}">New Valley</a>
          <a class="dropdown-item{{$submenu == str_slug('Luxor') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Luxor')])}}">Luxor</a>
          <a class="dropdown-item{{$submenu == str_slug('Aswan') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Aswan')])}}">Aswan</a>
          <a class="dropdown-item{{$submenu == str_slug('Marsa Alam') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Marsa Alam')])}}">Marsa Alam</a>
          <a class="dropdown-item{{$submenu == str_slug('Upper Egypt') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Upper Egypt')])}}">Upper Egypt</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Travel Services</a>
        <div class="dropdown-menu">
          <a class="dropdown-item{{$submenu == str_slug('Hotels') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Hotels')])}}">Hotels</a> 
          <a class="dropdown-item{{$submenu == str_slug('Nile Cruises') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Nile Cruises')])}}">Nile Cruises</a> 
          <a class="dropdown-item{{$submenu == str_slug('Golf') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Golf')])}}">Golf</a> 
          <a class="dropdown-item{{$submenu == str_slug('Safari') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Safari')])}}">Safari</a> 
          <a class="dropdown-item{{$submenu == str_slug('Excursions') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Excursions')])}}">Excursions</a> 
          <a class="dropdown-item{{$submenu == str_slug('MICE') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('MICE')])}}">MICE</a> 
          <a class="dropdown-item{{$submenu == str_slug('Meet & Assist') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Meet & Assist')])}}">Meet & Assist</a> 
          <a class="dropdown-item{{$submenu == str_slug('Ahlan Airport Services') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Ahlan Airport Services')])}}">Ahlan Airport Services</a> 
          <a class="dropdown-item{{$submenu == str_slug('Aviation') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Aviation')])}}">Aviation</a>        
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Packages</a>
        <div class="dropdown-menu">
          <a class="dropdown-item{{$submenu == str_slug('Niche Tourism') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Niche Tourism')])}}">Niche Tourism</a>
          <a class="dropdown-item{{$submenu == str_slug('Honeymooner') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Honeymooner')])}}">Honeymooner</a>
          <a class="dropdown-item{{$submenu == str_slug('Religious Tourism') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Religious Tourism')])}}">Religious Tourism</a>
          <a class="dropdown-item{{$submenu == str_slug('Wellness') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Wellness')])}}">Wellness</a>
          <a class="dropdown-item{{$submenu == str_slug('Family Packages') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Family Packages')])}}">Family Packages</a>
          <a class="dropdown-item{{$submenu == str_slug('Leisure Packages') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Leisure Packages')])}}">Leisure Packages</a>
          <a class="dropdown-item{{$submenu == str_slug('Business Packages') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Business Packages')])}}">Business Packages</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Programs</a>
        <div class="dropdown-menu">
          <a class="dropdown-item{{$submenu == str_slug('Egypt') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Egypt')])}}">Egypt</a>
          <a class="dropdown-item{{$submenu == str_slug('Africa') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Africa')])}}">Africa</a>
          <a class="dropdown-item{{$submenu == str_slug('Asia') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Asia')])}}">Asia</a>
          <a class="dropdown-item{{$submenu == str_slug('Europe') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Europe')])}}">Europe</a> 
          <a class="dropdown-item{{$submenu == str_slug('Far East') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Far East')])}}">Far East</a> 
          <a class="dropdown-item{{$submenu == str_slug('Meddle East') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Meddle East')])}}">Meddle East</a> 
          <a class="dropdown-item{{$submenu == str_slug('USA') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('USA')])}}">USA</a> 
          <a class="dropdown-item{{$submenu == str_slug('Turkey') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Turkey')])}}">Turkey</a>
        </div>
    </li> 
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Gallery') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Gallery')])}}">Gallery</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Videos') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Videos')])}}">Videos</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('Minerva Events') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('Minerva Events')])}}">Minerva Events</a>
    </li>   
    <li class="nav-item">
        <a class="nav-link{{$submenu == str_slug('News') ? ' active':''}}" href="{{route('traveltours' , ['layout' => 'g', 'item' => str_slug('News')])}}">News</a>
    </li>      
  </ul>
</div>
<div class="clearfix"></div> 