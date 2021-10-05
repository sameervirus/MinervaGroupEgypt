<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="{{ $site_content['description'] }}">
    <meta name="keywords" content="{{$site_content['keywords']}}">
    <title>@yield('title') | {{ $site_content['title'] . ' - ' . $site_content['description'] }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="{{ $site_content['title'] }}" />
    <meta property="og:type" content="Trading Company" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:description" content="{{ $site_content['description'] }}" />
    <meta property="og:image" content="{{url('images/slide02.jpg')}}" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120018792-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-120018792-1');
    </script>

    <link rel="icon" type="image/png" href="{{ asset('images/'. $site_content['favicon']) }}">

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap-4.1.0/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('node_modules/@fortawesome/fontawesome-free/css/all.css')}}" rel="stylesheet">
    <!-- animate.css -->
    <link href="{{asset('vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    <!-- fancybox -->
    <link href="{{asset('vendors/fancybox-2.1.7/source/jquery.fancybox.css')}}" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Exo+2|Open+Sans" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('cssFiles', '')

    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}?v={{time()}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}?v={{time()}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/print.css')}}?v={{time()}}" media="print" />
</head>
    <body>
    {{Visitor::log()}}
    <div class="box">
        <header>
            <div id="top-bar" class="no-print">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="social">
                                <ul class="list-inline">
                                    <li class="list-inline-item">     
                                        <div class="dropdown">
                                          
                                            @if (!Auth::guard('web')->check())
                                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Account
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('login')}}">Sign in</a>
                                            <a class="dropdown-item" href="{{route('register')}}">Create an Account</a>
                                            @endif
                                            @if (Auth::guard('web')->check())
                                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Hello, {{ Auth::user()->name }} {{ Auth::user()->lname }}
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('account')}}">My Account</a>
                                            <a class="dropdown-item" href="{{ route('wishs')}}">Wish List</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('user.logout') }}" onlick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;"> @csrf </form>
                                            @endif
                                          </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $site_content['social_facebook'] }}" target="_blank">
                                          <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $site_content['social_twitter'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $site_content['social-linkedin'] }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $site_content['social-youtube'] }}" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $site_content['social_whatsapp'] }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 top-search">
                            <form method="get" action="{{route('search')}}">
                            <div class="input-group">
                              <input type="text" name="q" class="form-control" placeholder="Search for destination ..." aria-label="Search for destination ..." aria-describedby="basic-addon2"
                              required>
                              <div class="input-group-append">
                                <button class="btn go-btn" type="submit" id="button-addon2">Go!</button>
                              </div>
                            </div>
                            </form>
                        </div>
                        <div class="col-md-5 text-right info">
                            <span class="date-bar">Date: {{ \Carbon\Carbon::now()->formatLocalized('%A %d %B %Y') }}</span>
                            
                            <span class="date-bar">Weather: Cairo {{ (int)$weather->main->temp }}&deg;C <img src="//openweathermap.org/img/w/{{ $weather->weather[0]->icon }}.png" title="{{ $weather->weather[0]->description }}"> {{ $weather->weather[0]->main }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3">

                            <img id=logo src="@yield('logo', asset("/images/" . $site_content['logo']))">
                        </div>
                        <div class="col-lg-9 no-print">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span> Menu
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link{{$page=='home'?' active':''}}" href="{{route('home')}}">Home</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle {{$page=='about'?' active':''}}" href="#" id="drop-menu"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Us</a>
                                            <div class="dropdown-menu" aria-labelledby="drop-menu">
                                                <a class="dropdown-item" href="{{route('about')}}">Our Group</a>
                                                <a class="dropdown-item" href="{{route('vision')}}">Our Vision</a>
                                                <a class="dropdown-item" href="{{route('mission')}}">Our Mission</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link{{$page=='minerva-travel-tours'?' active':''}}" href="{{route('company' , ['minerva-travel-tours','company-profile'])}}">Minerva Travel & tours</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link{{$page=='minerva-healthcare-medical-tourism'?' active':''}}" href="{{route('company',['minerva-healthcare-medical-tourism','introduction'])}}">Minerva HealthCare & Medical Tourism</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link{{$page=='minerva-business-development-for-economics-trade'?' active':''}}" href="{{route('company',['minerva-business-development-for-economics-trade','introduction'])}}">Minerva business Development for Economics & Trade</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link{{$page=='shanda-lodge'?' active':''}}" href="{{route('company' , ['shanda-lodge', 'about-us'])}}">Shanda Lodge</a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link{{$page=='egytat'?' active':''}}" href="{{route('company' , ['egytat','about-us'])}}">Egytat</a>
                                        </li> --}}
                                        @if (!Auth::guard('web')->check())
                                        <li class="nav-item">
                                            <a class="nav-link{{$page=='segistration'?' active':''}}" href="{{route('register')}}">Registration</a>
                                        </li>
                                        @endif
                                        <li class="nav-item">
                                            <a class="nav-link{{$page=='contacts'?' active':''}}" href="{{route('contacts')}}">Contact Us</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div id="shadow">
              <div class="div-height"></div>
            </div>
        </header>
        <content>
            @yield('content')            
        </content>
        <footer>
            <div id="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div>@2018 <span class="text-light">{{ $site_content['title'] }}</span> - All Rights Reserved.</div>
                        </div>
                        <div class="col-lg-6 design">Designed by <a href="//raindesigner.com" target="_blank">RainDesigner.com</a></div>
                    </div>
                </div>
            </div>
        </footer>
    
    </div>
    <!-- Modal -->
    <div class="modal fade" id="EmailToFriend" tabindex="-1" role="dialog" aria-labelledby="EmailToFriendLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EmailToFriendLabel">Email to friend</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{route('send_friend')}}">
            <input type="hidden" name="post" value="">
            {{ csrf_field() }}
          <div class="modal-body">            
              <div class="form-group">
                <label for="exampleInputName">Recipient's Name</label>
                <input type="text" name="friendName" class="form-control" id="exampleInputName" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">Recipient's email address *</label>
                <input type="email" name="friendEmail" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email Required" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share this email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Your Name *</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Enter Name Required" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail2">Your email address *</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter email Required" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share this email with anyone else.</small>
              </div>
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LddGL8ZAAAAAJTFAZZb_NTdpLJlr00uutLbovUs"></div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
          </form>
        </div>
      </div>
    </div>    
    <input type="hidden" id="user_id" value="{{Auth::user()->id ?? '0'}}">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">You need to Login to add item in your wish list</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-row">
                <div class="w100">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="col-lg-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>

                            <div class="">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>

                            <div class="">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <div class="">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                    Or
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    Create account
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap-4.1.0/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap-4.1.0/dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('node_modules/jquery-plugin-c-share/dist/jquery.c-share.min.js')}}"></script>
    <!-- fancybox -->
    <script src="{{asset('vendors/fancybox-2.1.7/source/jquery.fancybox.js')}}"></script>  
    <script src="{{asset('js/bootstrap-select.js')}}"></script>
    <script src="{{asset('vendors/build/js/notify.min.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @yield('jsFiles', '')

    @if (Session::has('friend'))
        @if (Session::get('friend') == 'sucsses')
        <script type="text/javascript">
            sweetAlert("Email Sent!", "Thank you for choosing Minerva", "success");
        </script>            
        @endif
    @endif

    <!-- Custom Style -->
    <script src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript">
        $('body').on('click', '.wishBtns a', function (e) {
            var item_id = $(this).data('value');
            var user_id = $('#user_id').val();
            var ckb = false;

            if(user_id == 0) {
                e.preventDefault();
                $('#exampleModalCenter').modal('toggle');
            } else {
                if(this.className=="" || this.className == "remove"){
                    this.className = "add"; ckb = true;
                } else {
                    this.className = "remove"; ckb = false;
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('withlist') }}",
                    data: "ckb=" + ckb + "&user_id=" +user_id + "&item_id=" + item_id+"&_token={{ csrf_token() }}",
                    success: function(msg) {
                      if(msg == 'ok') {
                        if(ckb) {
                            $.notify("Add to your withlist Successfully.", "success");
                        } else {
                            $.notify("Remove from your withlist Successfully.", "success");
                        }
                      } else {
                        e.preventDefault();
                        $.notify("Something went wrong please try again.", "error");
                      }
                    }
                });
            }            
        });
        $('#shareBlock').cShare({
          showButtons: [
            'fb',
            'gPlus',            
            'twitter',
            'email'
          ]
        });
    </script>
  </body>
</html>