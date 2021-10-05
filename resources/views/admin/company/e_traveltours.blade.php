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
                            action="{{route('traveltours.update', ['traveltours' => $item] ) }}"
                            @else
                            action="{{route('traveltours.store')}}"
                            @endif
                            enctype="multipart/form-data">
                                
                            {{ csrf_field() }} 

                            {{ @$item ? method_field('PUT') : '' }}

                            
                            <div class="form-group">
                                <label class="col-md-2 control-label">Item Category *</label>
                                <div class="col-md-10">
                                    <select name="category" class="form-control" required>
<option value="Africa" @if(@$item && $item->slug_category == str_slug("Africa")) selected @endif >Africa</option>
<option value="Ahlan Airport Services" @if(@$item && $item->slug_category == str_slug("Ahlan Airport Services")) selected @endif >Ahlan Airport Services</option>
<option value="Ain El Sokhna" @if(@$item && $item->slug_category == str_slug("Ain El Sokhna")) selected @endif >Ain El Sokhna</option>
<option value="Alexandria" @if(@$item && $item->slug_category == str_slug("Alexandria")) selected @endif >Alexandria</option>
<option value="Asia" @if(@$item && $item->slug_category == str_slug("Asia")) selected @endif >Asia</option>
<option value="Aswan" @if(@$item && $item->slug_category == str_slug("Aswan")) selected @endif >Aswan</option>
<option value="Aviation" @if(@$item && $item->slug_category == str_slug("Aviation")) selected @endif >Aviation</option>
<option value="Business Packages" @if(@$item && $item->slug_category == str_slug("Business Packages")) selected @endif >Business Packages</option>
<option value="Cairo" @if(@$item && $item->slug_category == str_slug("Cairo")) selected @endif >Cairo</option>
<option value="Company Profile" @if(@$item && $item->slug_category == str_slug("Company Profile")) selected @endif >Company Profile</option>
<option value="Egypt" @if(@$item && $item->slug_category == str_slug("Egypt")) selected @endif >Egypt</option>
<option value="Europe" @if(@$item && $item->slug_category == str_slug("Europe")) selected @endif >Europe</option>
<option value="Excursions" @if(@$item && $item->slug_category == str_slug("Excursions")) selected @endif >Excursions</option>
<option value="Family Packages" @if(@$item && $item->slug_category == str_slug("Family Packages")) selected @endif >Family Packages</option>
<option value="Far East" @if(@$item && $item->slug_category == str_slug("Far East")) selected @endif >Far East</option>
<option value="Gallery" @if(@$item && $item->slug_category == str_slug("Gallery")) selected @endif >Gallery</option>
<option value="Golf" @if(@$item && $item->slug_category == str_slug("Golf")) selected @endif >Golf</option>
<option value="Honeymooner" @if(@$item && $item->slug_category == str_slug("Honeymooner")) selected @endif >Honeymooner</option>
<option value="Hotels" @if(@$item && $item->slug_category == str_slug("Hotels")) selected @endif >Hotels</option>
<option value="Hurghada" @if(@$item && $item->slug_category == str_slug("Hurghada")) selected @endif >Hurghada</option>
<option value="Leisure Packages" @if(@$item && $item->slug_category == str_slug("Leisure Packages")) selected @endif >Leisure Packages</option>
<option value="Luxor" @if(@$item && $item->slug_category == str_slug("Luxor")) selected @endif >Luxor</option>
<option value="Marsa Alam" @if(@$item && $item->slug_category == str_slug("Marsa Alam")) selected @endif >Marsa Alam</option>
<option value="Meddle East" @if(@$item && $item->slug_category == str_slug("Meddle East")) selected @endif >Meddle East</option>
<option value="Meet Assist" @if(@$item && $item->slug_category == str_slug("Meet Assist")) selected @endif >Meet Assist</option>
<option value="Mice" @if(@$item && $item->slug_category == str_slug("Mice")) selected @endif >Mice</option>
<option value="Minerva Events" @if(@$item && $item->slug_category == str_slug("Minerva Events")) selected @endif >Minerva Events</option>
<option value="New Valley" @if(@$item && $item->slug_category == str_slug("New Valley")) selected @endif >New Valley</option>
<option value="News" @if(@$item && $item->slug_category == str_slug("News")) selected @endif >News</option>
<option value="Niche Tourism" @if(@$item && $item->slug_category == str_slug("Niche Tourism")) selected @endif >Niche Tourism</option>
<option value="Nile Cruises" @if(@$item && $item->slug_category == str_slug("Nile Cruises")) selected @endif >Nile Cruises</option>
<option value="Religious Tourism" @if(@$item && $item->slug_category == str_slug("Religious Tourism")) selected @endif >Religious Tourism</option>
<option value="Safari" @if(@$item && $item->slug_category == str_slug("Safari")) selected @endif >Safari</option>
<option value="Sharm El Shiekh" @if(@$item && $item->slug_category == str_slug("Sharm El Shiekh")) selected @endif >Sharm El Shiekh</option>
<option value="Siwa" @if(@$item && $item->slug_category == str_slug("Siwa")) selected @endif >Siwa</option>
<option value="Turkey" @if(@$item && $item->slug_category == str_slug("Turkey")) selected @endif >Turkey</option>
<option value="Upper Egypt" @if(@$item && $item->slug_category == str_slug("Upper Egypt")) selected @endif >Upper Egypt</option>
<option value="USA" @if(@$item && $item->slug_category == str_slug("USA")) selected @endif >USA</option>
<option value="Videos" @if(@$item && $item->slug_category == str_slug("Videos")) selected @endif >Videos</option>
<option value="Wellness" @if(@$item && $item->slug_category == str_slug("Wellness")) selected @endif >Wellness</option>
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
                  <img src="{{asset('images/traveltours/' . $image)}}" alt="image" width="100%">
                  <div class="mask">
                    <p></p>
                    <div class="tools tools-bottom">

                    <a href="#" onclick="event.preventDefault(); document.getElementById('del_image').submit();"><i class="fa fa-times"></i></a> 
                    <form method="POST" action="{{route('traveltours_delimg')}}" class="hidden" id="del_image">
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
