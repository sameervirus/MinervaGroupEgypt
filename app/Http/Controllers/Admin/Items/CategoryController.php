<?php

namespace App\Http\Controllers\Admin\Items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = \DB::table('categories')->distinct()->get(['category', 'category_slug']);

        return view('admin.items.items_categories',['companies' => $companies]);
    }

    public function show($company)
    {
        $companies = \DB::table('categories')->distinct()->get(['category', 'category_slug']);
        $comapny = \DB::table('categories')->where('category_slug',$company)->get();
        return view('admin.items.items_categories',['companies' => $companies,'comapny' => $comapny]);
    }


    public function store(Request $request)
    {
        $update = \DB::table('categories')
                    ->where('id', $request->id)
                    ->update(['layout' => $request->layout]);

        if($update) {
            return 'ok';
        } else {
            return 'no';
        }
    }
}
