<?php

namespace App\Http\Controllers\Admin\Products;

use App\Admin\Products\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\UploadClass;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('category')->get();

        return view('admin.products.products', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $handle = new UploadClass($request->file('file'));
        
        if ($handle->uploaded) {
          $handle->image_resize         = true;
          $handle->image_ratio_crop     = true;
          $handle->image_x              = 1182;
          $handle->image_y              = 842;
          $handle->process('images/products');
          
          if ($handle->processed) {
            $massage = 'Successfully Added';
            $file_name=$handle->file_dst_name;
            $handle->clean();
            
            $details = '';
            $details_ar = '';
            
            if ($request->filled('details'))  $details = $request->details;
            if ($request->filled('details_ar'))  $details_ar = $request->details_ar;

            Product::create([
                'image' => $file_name,
                'category' => $request->category,
                'category_ar' => $request->category_ar,
                'category_slug' => str_slug($request->category),
                'name' => $request->name,
                'name_ar' => $request->name_ar,
                'details' => $details,
                'details_ar' => $details_ar
            ]);

          } else {
            $massage = 'error : ' . $handle->error;
          }
        }
        
        return \Redirect::route('products.index')->with('message', $massage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $products = Product::where('category_slug' , $category)->orderBy('id')->paginate(10);
        $categories = Product::get_category();

        return view('en.products', [
            'products' => $products,
            'categories' => $categories,
            'page' => 'products'
        ]);
    }

    public function show_ar($category)
    {
        $products = Product::where('category_slug' , $category)->orderBy('id')->paginate(10);
        $categories = Product::get_category();

        return view('ar.products', [
            'products' => $products,
            'categories' => $categories,
            'page' => 'products'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //        
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {        

        if($request->file('file')){

            $handle = new UploadClass($request->file('file'));
        
            if ($handle->uploaded) {
              $handle->image_resize         = true;
              $handle->image_ratio_crop     = true;
              $handle->image_x              = 1392;
              $handle->image_y              = 930;
              $handle->process('images/products');
              
              if ($handle->processed) {
                \File::delete('images/products/'. $product->image);
                $massage = 'ok';
                $product->image = $handle->file_dst_name;
                $handle->clean();
              } else {
                $massage = 'error : ' . $handle->error;
              }
            }
        }

        $product->name = $request->name;
        $product->name_ar = $request->name_ar;
        $product->category = $request->category;
        $product->category_ar = $request->category_ar;
        $product->category_slug = str_slug($request->category);

        if($request->filled('details'))  $product->details = $request->details;
        if($request->filled('details_ar'))  $product->details_ar = $request->details_ar;

        $product->save();

        $massage = 'Successfully Updated';

        return back()->with('message', $massage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        \File::delete('images/products/'. $product->image);
        $product->delete();
        return back()->with('message', 'Successfully Deleted!');
    }
}
