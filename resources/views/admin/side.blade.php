<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-user"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('/admin')}}">Dashboard</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Main Content <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('sitecontent.index')}}?lang=en">Basic Data</a></li>
                </ul>
            </li>
			
            <li><a><i class="fa fa-home"></i> Home Page Content <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('slider.index')}}">Main Slider</a></li>
				</ul>
            </li>
        <!--
			<li><a><i class="fa fa-file-powerpoint-o"></i> الصفحات الثابتة <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('admin/page/about_ar')}}">صفحة عن النادي</a></li>
                    <li><a href="{{url('admin/manager')}}">صفحة مجلس الادارة</a></li>
				</ul>
            </li>
        -->
            
			{{-- <li><a><i class="fa fa-desktop"></i> Dynamic Elements <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('healthcare.index')}}">Health Care</a></li>
                    <li><a href="{{route('traveltours.index')}}">Travel & Tours</a></li>
                    <li><a href="{{route('shandalodge.index')}}">Shanda Lodge</a></li>
                    <li><a href="{{route('egytat.index')}}">Egytat</a></li>

                </ul>
            </li>
            @permission('designer') --}}
            <li><a><i class="fa fa-desktop"></i> Dynamic Elements <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('companies.index')}}">Category Layout</a></li>
                    <li><a href="{{route('items.show','minerva-healthcare-medical-tourism')}}">Health Care</a></li>
                    <li><a href="{{route('items.show','minerva-travel-tours')}}">Travel & Tours</a></li>
                    <li><a href="{{route('items.show','minerva-business-development-for-economics-trade')}}">Business Development</a></li>
                    <li><a href="{{route('items.show','shanda-lodge')}}">Shanda Lodge</a></li>
                    <li><a href="{{route('items.show','egytat')}}">Egytat</a></li>

                </ul>
            </li>
            {{-- @endpermission --}}
        
			<li><a><i class="fa fa-envelope"></i> Users Activity<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('users.feed', 'contactus')}}">Contact us Form</a></li>
                    <li><a href="{{route('users.feed', 'send_friend')}}">Friend Form</a></li>
                    <li><a href="{{route('users.feed', 'users')}}">Register Users</a></li>
                </ul>
            </li>
        			
        </ul>
    </div>    
</div>
<!-- /sidebar menu -->
<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>