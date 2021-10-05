@extends('admin.admin')

@section('title', 'Products')

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
                        <p>
                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".add-user"><i class="fa fa-plus"></i> Add Products </a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table">
                                <thead>
                                    <tr class="headings">
                                        <th>No.</th>
                                        <th class="column-title">Products Type</th>
                                        <th class="column-title">Products Name</th>
                                        <th class="column-title">اسم المنتج</th>
                                        <th class="column-title no-link last"><span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{ $current = '' }}
                                   @foreach ($products as $product)
                                    @if ($product->category != $current)
                                        <tr><td colspan="5" style="background: #000;color: #fff;">{{$product->category}}</td></tr>   
                                    @endif
                                    @php $current = $product->category @endphp
                                    <tr class="even pointer">
                                        <td class="a-center ">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="category">{{ $product->category }}</td>
                                        <td class="name">{{$product->name }}</td>
                                        <td class="name">{{$product->name_ar }}</td>
                                        <td class="">                                            
                                            <a href="{{route('products.edit', ['product' => $product->id] ) }}" data-id="" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a href="" onclick="event.preventDefault(); document.getElementById('del_{{$product->id}}').click();"
                                                class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                            <form 
                                                method="POST" 
                                                action="{{ route('products.destroy' , ['product' => $product ]) }}" 
                                                onsubmit="return confirm('هل تريد حقاً حذف هذا المنتج?');">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                               <button type="submit" class="hidden" id="del_{{$product->id}}">Delete</button>
                                            </form>
                                        </td>
                                        </td>
                                    </tr>                                    
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                            

                          <div class="modal fade add-user" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel2">Add Product</h4>
                                </div>                                
                                <form class="form-horizontal" role="form" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">                              
                                <div class="modal-body">
                                  
                                    {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="POST">

                                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                        <label for="category" class="col-md-2 control-label">Product Type</label>

                                        <div class="col-md-10">
                                            <input id="category" type="text" class="form-control" 
                                            name="category" value="" required autofocus placeholder="Product Type">

                                            <input type="text" class="form-control" 
                                            name="category_ar" value="" required placeholder="نوع المنتج">

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
                                            <input id="name" type="text" class="form-control" name="name" value="" required placeholder="Product Name">

                                            <input type="text" class="form-control" name="name_ar" value="" required placeholder="اسم المنتج بالعربي">

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="description" class="col-md-2 control-label">Product Description</label>

                                        <div class="col-md-10">
											<textarea type="text" name="details" id="description" class="form-control" row="4" placeholder="Product Details"></textarea>

                                            <textarea type="text" name="details_ar" class="form-control" row="4" placeholder="وصف المنتج بالعربي"></textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
									
									<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                                        <label for="img" class="col-md-2 control-label">Product Images</label>
										
                                        <div class="col-md-10">
                                            <input id="img" type="file" class="form-control" name="file" value="" required accept="image/*">
											<p class="help-block">Use High resolution images</p>
                                        </div>
                                    </div>								
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                                </form>                                
                              </div>
                            </div>
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

@endsection
