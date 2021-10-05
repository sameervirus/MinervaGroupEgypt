@extends('admin.admin')

@section('title', 'Company Categories')

@section('cssFiles')

@endsection

@section('content')

<div class="right_col" role="main">
    
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Company Categories<small></small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        @if (session('message'))
            <div id="back-message" class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Oh yeah!</strong> {{session('message')}}
             </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Company Categories<small></small></h2>
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
                        <form class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right">Select Company</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option value="{{@$comapny[0]->category_slug or ''}}">{{ $comapny[0]->category or 'Choose Company' }}</option>
                                    @foreach ($companies as $row)
                                    @continue(@$comapny[0]->category_slug == $row->category_slug)
                                    <option value="{{route('companies.show', $row->category_slug)}}">{{ $row->category }}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        @include('flash::message')
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Category List <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table">
                                <thead>
                                    <tr class="headings">
                                        <th>No.</th>
                                        <th class="column-title">Category</th>
                                        <th class="column-title">Sub-Category</th>
                                        <th class="column-title no-link last"><span class="nobr">Layout</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(@$comapny)
                                    @foreach ($comapny as $item)
                                    <tr class="even pointer">
                                        <td class="a-center ">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="category">{{ $item->category }}</td>
                                        <td class="name">{{ ucwords(str_replace('-', ' ', $item->sub_category)) }}</td>
                                        <td class="">                                            
                                            <select data-id="{{ $item->id }}" class="form-control layoutChange">
                                                <option 
                                                    value="grid"
                                                    @if($item->layout == 'grid') selected @endif
                                                >Grid</option>
                                                <option 
                                                    value="list"
                                                    @if($item->layout == 'list') selected @endif
                                                >List</option>
                                                <option 
                                                    value="expedia"
                                                    @if($item->layout == 'expedia') selected @endif
                                                >Expedia List</option>
                                                <option 
                                                    value="one"
                                                    @if($item->layout == 'one') selected @endif
                                                >One item</option>
                                            </select>
                                        </td>
                                    </tr>                                    
                                   @endforeach
                                   @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>

@endsection

@section('jsFiles')
    
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script> 

    <script type="text/javascript">
        $("body").on("change",".layoutChange", function () {
            var id = $(this).data("id");
            var value = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('companies.store') }}",
                data: "id=" +id + "&layout=" + value+"&_token={{ csrf_token() }}",
                beforeSend: function() {
                  $("#overlay").fadeIn(300);
                },
                success: function(msg) {
                  if(msg == 'ok') {
                    $.notify("Layout Changed Successfully.", "success");
                  } else {
                    $.notify("BOOM!, Something went wrong please try again.", "error");
                  }
                  $("#overlay").fadeOut(300);
                }
            });
        });
    </script>

@endsection