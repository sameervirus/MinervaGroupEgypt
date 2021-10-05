@extends('admin.admin')

@section('title', 'Dashboard')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <br />
        <div class="row tile_count">
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Yesterday Visitor</span>
                <div class="count">{{$visitor_stuts['yesterday_visitor']}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Total Visitor Today</span>
                <div class="count">{{$visitor_stuts['today_visitor']}}</div>
                <span class="count_bottom">{{ $users_count }} Online Users from {{$numberOfGuests}} Online</span>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Visitor</span>
                <div class="count green">{{$visitor_stuts['count']}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph x_panel">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>Site Visitor <small>Chart shown site visitor</small></h3>
                        </div>
                        <div class="col-md-6">
                            <div id="d" class="pull-right data-chart" style="background: #2a3f54; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <span>Day</span>
                            </div>
                            <div id="w" class="pull-right data-chart" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <span>Week</span>
                            </div>
                            <div id="m" class="pull-right data-chart" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <span>Month</span>
                            </div>
                        </div>
                    </div>
                    <div class="x_content">
                        <div class="demo-container" style="height:250px">
                            <div id="chart_plot_03" class="demo-placeholder" data-d="{{$day}}" data-w="{{$week}}" data-m="{{$month}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Visitors location <small>geo-presentation</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="dashboard-widget-content">
                            <div class="col-md-4 hidden-small">
                                <h2 class="line_30" data-geo="{{ $geo }}">125.7k Views from 60 countries</h2>
                                <table class="countries_list">
                                    <tbody>
                                        @foreach (json_decode($country_name) as $contry => $visit)
                                        <tr>
                                            <td>{{$contry}}</td>
                                            <td class="fs15 fw700 text-right">{{$visit}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="world-map-gdp" class="col-md-7 col-sm-12 col-xs-12" style="height:230px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsFiles')
    <!-- bootstrap-progressbar -->
    <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
   
    <!-- Flot -->
    <script src="{{asset('vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.time.js')}}"></script>
    <!-- Flot plugins -->

    <script src="{{asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
   

    <!-- JQVMap -->
    <script src="{{asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script type="text/javascript">
        /* Dashbord Flow Chart */

        function init_flot_chart(source = 'd'){
            
            if( typeof ($.plot) === 'undefined'){ return; }
            
            console.log('init_flot_chart');
            
            var chart_plot_03_data = $('#chart_plot_03').data(source);
        
            var chart_plot_03_settings = {
                series: {
                    curvedLines: {
                        apply: true,
                        active: true,
                        monotonicFit: true
                    }
                },
                colors: ["#26B99A"],
                grid: {
                    borderWidth: {
                        top: 0,
                        right: 0,
                        bottom: 1,
                        left: 1
                    },
                    borderColor: {
                        bottom: "#7F8790",
                        left: "#7F8790"
                    }
                },
                xaxis: {
                    mode: "time",
                    timeformat: "%Y/%m/%d"
                }
            };        
            
            if ($("#chart_plot_03").length){
                
                console.log('Plot3');       
                
                $.plot($("#chart_plot_03"), [chart_plot_03_data], chart_plot_03_settings);
                
            };
          
        }


        $(".data-chart").click(function () {
            $(".data-chart").css('background','#ffffff');
            $(this).css('background','#2a3f54');        
            init_flot_chart(this.id);
        });



    /* World Map */
        function init_JQVmap(){

            //console.log('check init_JQVmap [' + typeof (VectorCanvas) + '][' + typeof (jQuery.fn.vectorMap) + ']' );  
            
            if(typeof (jQuery.fn.vectorMap) === 'undefined'){ return; }
            
            console.log('init_JQVmap');
             
                if ($('#world-map-gdp').length ){

            var visitor_data = $('.line_30').data('geo');
             
                    $('#world-map-gdp').vectorMap({
                        map: 'world_en',
                        backgroundColor: null,
                        color: '#ffffff',
                        hoverOpacity: 0.7,
                        selectedColor: '#666666',
                        enableZoom: true,
                        showTooltip: true,
                        values: visitor_data,
                        scaleColors: ['#E6F2F0', '#149B7E'],
                        normalizeFunction: 'polynomial'
                    });
                
                }           
                
        };

      var visitor_contury = $('.fs15').length;
      var visitor_count =0;
      $('.fs15').each(function() {
        visitor_count = visitor_count + parseInt($(this).text());
      });
      $('.line_30').text(visitor_count + ' Views from ' + visitor_contury + ' countries');


        $(document).ready(function() {
            init_flot_chart(),
            init_JQVmap()
        });
    </script>
@endsection
