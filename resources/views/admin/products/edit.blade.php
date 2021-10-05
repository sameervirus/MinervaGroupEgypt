@extends('admin.admin')

@section('title', 'Products')

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
      .thumbnail .image {height: auto!important;}
    </style>
@endsection

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Products<small></small></h3>
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
                        <h2>Products <small></small></h2>
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
                            action="{{route('products.update', ['product' => $product] ) }}" 
                            enctype="multipart/form-data">
                                
                            {{ csrf_field() }} {{ method_field('PUT') }}

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-2 control-label">Product Type</label>

                                <div class="col-md-10">
                                    <input id="category" type="text" class="form-control" 
                                    name="category" value="{{$product->category}}" required autofocus />

                                    <input type="text" class="form-control" placeholder="نوع المنتج"
                                    name="category_ar" value="{{$product->category_ar}}" required />

                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Product Name</label>

                                <div class="col-md-10">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$product->name}}" required>

                                    <input type="text" class="form-control" name="name_ar" value="{{$product->name_ar}}" required placeholder="اسم المنتج بالعربي">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                <label for="details" class="col-md-2 control-label">Product details</label>

                                <div class="col-md-10">
                                    <textarea type="text" name="details" id="details" class="form-control" row="4">{{$product->details}}</textarea>
                                    <textarea type="text" name="details_ar" class="form-control" row="4" placeholder="وصف المنتج بالعربي">{{$product->details_ar}}</textarea>
                                    @if ($errors->has('details'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('details') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                <label for="details" class="col-md-2 control-label">Product details</label>
                                <div class="col-md-10 thumbnail">
                                    <div class="image view view-first">
                                      <img style="width: 100%; display: block;" src="{{asset('images/products/'. $product->image )}}" alt="image" id="{{$product->id}}">
                                      <div class="mask no-caption">
                                        <div class="tools tools-bottom">
                                          <input type="file" name="file" id="file_{{$product->id}}" data-id="{{$product->id}}" class="inputfile" />
                                          <label for="file_{{$product->id}}">غير الصورة</label>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
               
                          <a href="{{route('products.index')}}" type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                          <button type="submit" class="btn btn-primary">Edit</button>
       
                        </form>
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
      
      function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#' + id).attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
      } 

      $(".inputfile").change(function(){
          var img = $(this).data('id');
          readURL(this, img);
      });
    </script>

@endsection
