@extends('admin.admin')

@section('title', (@$itemData->name or ''))

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
      ul.bar_tabs>li {margin-left: 3px!important;margin-top: -5px!important;}
      ul.bar_tabs>li a{padding: 5px!important;}
      ul.bar_tabs>li.active{margin-top: -5px!important;}
      #myTabContent{margin-top: 26px}
    </style>
@endsection

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$item->sub_category or 'Item Name' }}<small></small></h3>
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
                        <h2>{{$itemData->name or 'Item Name' }} <small></small></h2>
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
                            action="{{route('items.update', ['item' => $item] ) }}"
                            @else
                            action="{{route('items.store')}}"
                            @endif
                            enctype="multipart/form-data">
                                
                            {{ csrf_field() }} 

                            {{ @$item ? method_field('PUT') : '' }}
                            <input type="hidden" name="category" value="{{$categories[0]->category}}">
                            <input type="hidden" name="category_slug" value="{{$categories[0]->category_slug}}">
                            <input type="hidden" name="languagecode" value="{{$lang}}">

                            @isset($item)
                            <div class="form-group">
                              <span class="col-md-8"></span>
                              <label class="col-md-2 control-label">language *</label>
                              <div class="col-md-2">
                                <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                  <option value="{{route('items.edit', [$item->id,'lang'=>'en'])}}"
                                    @if($lang == 'en') selected @endif 
                                    >English</option>
                                  <option value="{{route('items.edit', [$item->id,'lang'=>'es'])}}"
                                    @if($lang == 'es') selected @endif 
                                    >Spanish</option>
                                  <option value="{{route('items.edit', [$item->id,'lang'=>'de'])}}"
                                    @if($lang == 'de') selected @endif 
                                    >Germany</option>
                                  <option value="{{route('items.edit', [$item->id,'lang'=>'fr'])}}"
                                    @if($lang == 'fr') selected @endif 
                                    >French</option>
                                </select>
                              </div>
                            </div>                              
                            @endisset
                            <div class="form-group">
                                <label class="col-md-2 control-label">Item Category *</label>
                                <div class="col-md-10">
                                    <select name="sub_category" class="form-control" required>
                                      @foreach($categories as $category)
                                        <option 
                                          value="{{ ucwords(str_replace('-', ' ', $category->sub_category)) }}"
                                          @if(@$item->sub_category_slug == $category->sub_category) selected @endif 
                                          >{{ ucwords(str_replace('-', ' ', $category->sub_category))}}</option>

                                      @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Item Name *</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" value="{{$itemData->name or ''}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Book url</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="book_url" value="{{$item->book_url or ''}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Price</label>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" name="price" value="{{$item->price or ''}}">
                                </div>
                                <label class="col-md-1 control-label">Currency</label>
                                <div class="col-md-2">
                                    <select name="currency_id" class="form-control" required>
                                      @foreach(\App\Currency::all() as $currency)
                                      <option value="{{$currency->id}}" @if(@$item->currency_id == $currency->id) selected @endif>{{$currency->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <label class="col-md-2 control-label">Layout</label>
                                <div class="col-md-2">
                                  <select name="layout" class="form-control">
                                    <option value="default" @if(@$item->layout == 'default') selected @endif>Default</option>
                                    <option value="expedia" @if(@$item->layout == 'expedia') selected @endif>Expedia</option>
                                  </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Locations</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="locations" value="{{$itemData->locations or ''}}">
                                </div>
                                <label class="col-md-2 control-label">Duration</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="duration" value="{{$itemData->duration or ''}}">
                                </div>
                            </div>



  <div class="form-group">
      <label class="col-md-2 control-label">Item Data</label>
      <div class="col-md-10">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content12" id="short_description-tab" role="tab" data-toggle="tab" aria-expanded="false">Short Description</a></li>
          <li role="presentation" class=""><a href="#tab_content13" id="highlights-tab" role="tab" data-toggle="tab" aria-expanded="false">Highlights</a></li>
          <li role="presentation" class=""><a href="#tab_content1" id="description-tab" role="tab" data-toggle="tab" aria-expanded="false">Description</a></li>
          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="day_by_day-tab" data-toggle="tab" aria-expanded="false">Day by day</a></li>
          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="inclusions" data-toggle="tab" aria-expanded="true">Inclusions</a></li>
          <li role="presentation" class=""><a href="#tab_content4" role="tab" id="exclusions" data-toggle="tab" aria-expanded="true">Exclusions</a></li>
          <li role="presentation" class=""><a href="#tab_content5" role="tab" id="details" data-toggle="tab" aria-expanded="true">Details</a></li>
          <li role="presentation" class=""><a href="#tab_content6" role="tab" id="flights_transport" data-toggle="tab" aria-expanded="true">Flights Transport</a></li>
          <li role="presentation" class=""><a href="#tab_content7" role="tab" id="group_size" data-toggle="tab" aria-expanded="true">Group Size</a></li>
          <li role="presentation" class=""><a href="#tab_content8" role="tab" id="accommodations" data-toggle="tab" aria-expanded="true">Accommodations</a></li>
          <li role="presentation" class=""><a href="#tab_content9" role="tab" id="cancellation_policy" data-toggle="tab" aria-expanded="true">Cancellation Policy</a></li>
          <li role="presentation" class=""><a href="#tab_content10" role="tab" id="additional_info" data-toggle="tab" aria-expanded="true">Additional Info</a></li>
          <li role="presentation" class=""><a href="#tab_content11" role="tab" id="know_before_book" data-toggle="tab" aria-expanded="true">Know Before Book</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content12" aria-labelledby="short_description-tab">
            <textarea class="form-control textarea" type="text" name="short_description" rows="4">{{$itemData->short_description or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content13" aria-labelledby="highlights-tab">
            <textarea class="form-control textarea" type="text" name="highlights" rows="4">{{$itemData->highlights or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="description-tab">
            <textarea class="form-control textarea" type="text" name="description" rows="4">{{$itemData->description or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="day_by_day-tab">
            <textarea class="form-control textarea" type="text" name="day_by_day" rows="4">{{$itemData->day_by_day or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="inclusions">
            <textarea class="form-control textarea" type="text" name="inclusions" rows="4">{{$itemData->inclusions or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="exclusions">
            <textarea class="form-control textarea" type="text" name="exclusions" rows="4">{{$itemData->exclusions or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="details">
            <textarea class="form-control textarea" type="text" name="Details" rows="4">{{$itemData->details or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="flights_transport">
            <textarea class="form-control textarea" type="text" name="flights_transport" rows="4">{{$itemData->flights_transport or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="group_size">
            <textarea class="form-control textarea" type="text" name="group_size" rows="4">{{$itemData->group_size or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="accommodations">
            <textarea class="form-control textarea" type="text" name="accommodations" rows="4">{{$itemData->accommodations or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content9" aria-labelledby="cancellation_policy">
            <textarea class="form-control textarea" type="text" name="cancellation_policy" rows="4">{{$itemData->cancellation_policy or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content10" aria-labelledby="additional_info">
            <textarea class="form-control textarea" type="text" name="additional_info" rows="4">{{$itemData->additional_info or ''}}</textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content11" aria-labelledby="know_before_book">
            <textarea class="form-control textarea" type="text" name="know_before_book" rows="4">{{$itemData->know_before_book or ''}}</textarea>
          </div>
        </div>
      </div>
          
      </div>
  </div>

                            <div class="form-group">
                                <label for="img" class="col-md-2 control-label">Item Logo @if(!@$item->logo)*@endif</label>
                                <div class="col-md-8">
                                    <input id="img" type="file" class="form-control" name="logo" value="" accept="image/*" @if(!@$item->logo) required @endif>
                                    <p class="help-block">logo or Main Image @if(@$item->logo)if you want change Logo just choose new one @endif</p>
                                </div>
                                <div class="col-md-2">
                                  @isset($item->logo)
                                    <img src="{{asset('images/items/' . $item->logo)}}" alt="image" width="100%">
                                  @endisset
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
                  <img src="{{asset('images/items/' . $image)}}" alt="image" width="100%">
                  <div class="mask">
                    <p></p>
                    <div class="tools tools-bottom">

                    <a href="#" class="delImage" data-id="{{$item->id}}" data-img="{{$image}}"><i class="fa fa-times"></i></a> 
                    
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

    <script type="text/javascript">
      $(".delImage").click(function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        var img = $(this).data("img");
        var div = $(this).closest('.img-frame');
        $.ajax({
            type: "POST",
            url: "{{ route('items_delimg') }}",
            data: "id=" + id + "&img=" + img +"&_token={{ csrf_token() }}",
            beforeSend: function() {
              $("#overlay").fadeIn(300);
            },
            success: function(msg) {
              if(msg == 'ok') {
                $.notify("Image deleted successfuly.", "success");
                div.remove();
              } else {
                $.notify("BOOM!, Something went wrong please try again.", "error");
              }
              $("#overlay").fadeOut(300);
            }
        });
      });
    </script>

@endsection
