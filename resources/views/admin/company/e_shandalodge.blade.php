@extends('admin.admin')

@section('title', (@$item->name or ''))

@section ('cssFiles')
    <style type="text/css">
      .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
      }
      .inputfile + label {
          font-size: 1.25em;
          font-weight: 700;
          color: white;
          background-color: black;
          display: inline-block;
          padding: 0 20px;
      }

      .inputfile:focus + label,
      .inputfile + label:hover {
          background-color: red;
      }
      .inputfile + label {
        cursor: pointer; /* "hand" cursor */
      }
      .thumbnail .image {height: auto!important;min-height: 130px;}
    </style>
@endsection

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$item->category or 'Item Name' }}<small></small></h3>
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
                        <h2>{{$item->name or 'Item Name' }} <small></small></h2>
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

                        <form 
                            class="form-horizontal" 
                            role="form" 
                            method="POST"
                            @if(@$item)
                            action="{{route('shandalodge.update', ['shandalodge' => $item] ) }}"
                            @else
                            action="{{route('shandalodge.store')}}"
                            @endif
                            enctype="multipart/form-data">
                                
                            {{ csrf_field() }} 

                            {{ @$item ? method_field('PUT') : '' }}

                            
                            <div class="form-group">
                                <label class="col-md-2 control-label">Item Category *</label>
                                <div class="col-md-10">
                                    <select name="category" class="form-control" required>
<option value="About us" @if(@$item && $item->slug_category == str_slug("About us")) selected @endif >About us</option>
<option value="Archeology" @if(@$item && $item->slug_category == str_slug("Archeology")) selected @endif >Archeology</option>
<option value="Architecture" @if(@$item && $item->slug_category == str_slug("Architecture")) selected @endif >Architecture</option>
<option value="Bedouin Night" @if(@$item && $item->slug_category == str_slug("Bedouin Night")) selected @endif >Bedouin Night</option>
<option value="Bird watching" @if(@$item && $item->slug_category == str_slug("Bird watching")) selected @endif >Bird watching</option>
<option value="Camel Rides & Trekking" @if(@$item && $item->slug_category == str_slug("Camel Rides & Trekking")) selected @endif >Camel Rides & Trekking</option>
<option value="Culture Tours" @if(@$item && $item->slug_category == str_slug("Culture Tours")) selected @endif >Culture Tours</option>
<option value="Dakhla Oasis" @if(@$item && $item->slug_category == str_slug("Dakhla Oasis")) selected @endif >Dakhla Oasis</option>
<option value="Eco Projects" @if(@$item && $item->slug_category == str_slug("Eco Projects")) selected @endif >Eco Projects</option>
<option value="Events" @if(@$item && $item->slug_category == str_slug("Events")) selected @endif >Events</option>
<option value="Farafra Oasis" @if(@$item && $item->slug_category == str_slug("Farafra Oasis")) selected @endif >Farafra Oasis</option>
<option value="Flora & fauna" @if(@$item && $item->slug_category == str_slug("Flora & fauna")) selected @endif >Flora & fauna</option>
<option value="Gallery" @if(@$item && $item->slug_category == str_slug("Gallery")) selected @endif >Gallery</option>
<option value="History" @if(@$item && $item->slug_category == str_slug("History")) selected @endif >History</option>
<option value="Hot Spring" @if(@$item && $item->slug_category == str_slug("Hot Spring")) selected @endif >Hot Spring</option>
<option value="Hotel Rates" @if(@$item && $item->slug_category == str_slug("Hotel Rates")) selected @endif >Hotel Rates</option>
<option value="How to reach there" @if(@$item && $item->slug_category == str_slug("How to reach there")) selected @endif >How to reach there</option>
<option value="Kharga Oasis" @if(@$item && $item->slug_category == str_slug("Kharga Oasis")) selected @endif >Kharga Oasis</option>
<option value="Location" @if(@$item && $item->slug_category == str_slug("Location")) selected @endif >Location</option>
<option value="Lounges" @if(@$item && $item->slug_category == str_slug("Lounges")) selected @endif >Lounges</option>
<option value="Nature" @if(@$item && $item->slug_category == str_slug("Nature")) selected @endif >Nature</option>
<option value="Pool" @if(@$item && $item->slug_category == str_slug("Pool")) selected @endif >Pool</option>
<option value="Programs" @if(@$item && $item->slug_category == str_slug("Programs")) selected @endif >Programs</option>
<option value="Reception" @if(@$item && $item->slug_category == str_slug("Reception")) selected @endif >Reception</option>
<option value="Restaurants" @if(@$item && $item->slug_category == str_slug("Restaurants")) selected @endif >Restaurants</option>
<option value="Rooms" @if(@$item && $item->slug_category == str_slug("Rooms")) selected @endif >Rooms</option>
<option value="Desert Safari" @if(@$item && $item->slug_category == str_slug("Desert Safari")) selected @endif >Desert Safari</option>
<option value="Sand boarding" @if(@$item && $item->slug_category == str_slug("Sand boarding")) selected @endif >Sand boarding</option>
<option value="Spa & Wellness  " @if(@$item && $item->slug_category == str_slug("Spa & Wellness  ")) selected @endif >Spa & Wellness  </option>
<option value="Special Offers" @if(@$item && $item->slug_category == str_slug("Special Offers")) selected @endif >Special Offers</option>
<option value="Stargazing" @if(@$item && $item->slug_category == str_slug("Stargazing")) selected @endif >Stargazing</option>
<option value="Videos" @if(@$item && $item->slug_category == str_slug("Videos")) selected @endif >Videos</option>
<option value="Wellness & Recovery" @if(@$item && $item->slug_category == str_slug("Wellness & Recovery")) selected @endif >Wellness & Recovery</option>
<option value="Yoga & Meditation" @if(@$item && $item->slug_category == str_slug("Yoga & Meditation")) selected @endif >Yoga & Meditation</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Item Name *</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" value="{{$item->name or ''}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Item Details</label>
                                <div class="col-md-10">
                                    <textarea class="form-control textarea" type="text" name="details" rows="4">{{$item->details or ''}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="img" class="col-md-2 control-label">Item Logo @if(!@$item->logo)*@endif</label>
                                <div class="col-md-10">
                                    <input id="img" type="file" class="form-control" name="logo" value="" accept="image/*" @if(!@$item->logo) required @endif>
                                    <p class="help-block">logo or Main Image @if(@$item->logo)if you want change Logo just choose new one @endif</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Item Images</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="file[]" value="" accept="image/*" multiple>
                                    <p class="help-block">Use High resolution images</p>
                                </div>
                            </div>
               
                          <a href="#" onclick="window.history.go(-1); return false;" type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                          <button type="submit" class="btn btn-primary">Save</button>
       
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if (@$item->images)
        <div class="row">
          <h1>Delete Images</h1>
          @foreach(explode('|', $item->images) as $image)
          <div class="col-md-3 img-frame well">
              <div class="thumbnail">
                <div class="image view view-first">
                  <img src="{{asset('images/shandalodge/' . $image)}}" alt="image" width="100%">
                  <div class="mask">
                    <p></p>
                    <div class="tools tools-bottom">

                    <a href="#" onclick="event.preventDefault(); document.getElementById('del_image').submit();"><i class="fa fa-times"></i></a> 
                    <form method="POST" action="{{route('shandalodge_delimg')}}" class="hidden" id="del_image">
                      {{ csrf_field() }}
                      <input type="hidden" name="img" value="{{ $image }}">
                      <input type="hidden" name="id" value="{{ $item->id }}">
                      <input type="submit" value="submit">
                    </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          @endforeach
        </div>
        @endif
    </div>
</div>

@endsection

@section('jsFiles')
    
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>

    <script src="{{asset('vendors/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".mce-window").length) {
                e.stopImmediatePropagation();
            }
        });
        
        tinymce.init({
          selector: '.textarea',
          height: 200,
          images_upload_url: '/',
          theme: 'modern',
          plugins: 'code print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help paste',
          toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link media image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
          image_advtab: true,
          relative_urls : false,
          remove_script_host : false,
          document_base_url : "{{url('/uploads/')}}",

          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i'
          ],
          images_upload_handler: function (blobInfo, success, failure) {
             var xhr, formData;
             xhr = new XMLHttpRequest();
             xhr.withCredentials = false;
             xhr.open('POST', "{{ url('/admin/upload/img') }}");
             var token = '{{ csrf_token() }}';
             xhr.setRequestHeader("X-CSRF-Token", token);
             xhr.onload = function() {
                 var json;
                 if (xhr.status != 200) {
                     failure('HTTP Error: ' + xhr.status);
                     return;
                 }
                 json = JSON.parse(xhr.responseText);

                 if (!json || typeof json.location != 'string') {
                     failure('Invalid JSON: ' + xhr.responseText);
                     return;
                 }
                 success(json.location);
             };
             formData = new FormData();
             formData.append('file', blobInfo.blob(), blobInfo.filename());
             xhr.send(formData);
         }
         });
    </script>

@endsection
