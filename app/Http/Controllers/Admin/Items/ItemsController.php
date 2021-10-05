<?php

namespace App\Http\Controllers\Admin\Items;

use App\Admin\Items\Item;
use App\Admin\Items\ItemData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\UploadClass;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_slug)
    {
        $lang = 'en';
        $categories = \DB::table('categories')
                          ->where('category_slug', $category_slug)
                          ->orderBy('sub_category')
                          ->get();
        return view('admin.items.item',['categories'=>$categories, 'lang' => $lang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;

        if($file=$request->file('logo')){               
                
            $handle = new UploadClass($file);
            if ($handle->uploaded) {
              $handle->image_resize         = true;
              $handle->image_ratio_y        = true;
              $handle->image_x              = 900;
              $handle->process('images/items');
              if ($handle->processed) {
                $massage = 'image resized';
                $name=$handle->file_dst_name;
                $handle->clean();
              } else {
                $massage = 'error : ' . $handle->error;
              }
            }      
            $item->logo = $name;
        }
        
        if($gallary=$request->file('file')){

            foreach($gallary as $singleimg){
                
                $handle = new UploadClass($singleimg);
                if ($handle->uploaded) {
                  $handle->image_resize         = true;
                  $handle->image_ratio_y        = true;
                  $handle->image_x              = 900;
                  $handle->process('images/items');
                  if ($handle->processed) {
                    $massage = 'image resized';
                    $g_name[]=$handle->file_dst_name;
                    $handle->clean();
                  } else {
                    $massage = 'error : ' . $handle->error;
                  }
                }
            }

            $imgs = implode("|",$g_name);
            $item->images = $imgs;
            
        }
        // 'price','category','category_slug','sub_category','sub_category_slug','layout','logo','images'
        $item->book_url = $request->book_url;
        $item->price = $request->price;
        $item->currency_id = $request->currency_id;
        $item->category = $request->category;
        $item->category_slug = $request->category_slug;
        $item->sub_category = $request->sub_category;
        $item->sub_category_slug = str_slug($request->sub_category);
        $item->layout = $request->layout;

        $item->save();

        // 'item_id','languagecode','name','name_slug','duration','locations','short_description','highlights','description', 'day_by_day', 'inclusions', 'exclusions', 'details', 'flights_transport', 'group_size', 'accommodations', 'cancellation_policy', 'additional_info', 'know_before_book',
        
        $dataItem = new ItemData;
        $dataItem->item_id = $item->id;
        $dataItem->languagecode = $request->languagecode;
        $dataItem->name = $request->name;
        $dataItem->name_slug = str_slug($request->name);
        $dataItem->duration = $request->duration;
        $dataItem->locations = $request->locations;
        $dataItem->short_description = $request->short_description;
        $dataItem->highlights = $request->highlights;
        $dataItem->description = $request->description;
        $dataItem->day_by_day = $request->day_by_day;
        $dataItem->inclusions = $request->inclusions;
        $dataItem->exclusions = $request->exclusions;
        $dataItem->details = $request->details;
        $dataItem->flights_transport = $request->flights_transport;
        $dataItem->group_size = $request->group_size;
        $dataItem->accommodations = $request->accommodations;
        $dataItem->cancellation_policy = $request->cancellation_policy;
        $dataItem->additional_info = $request->additional_info;
        $dataItem->know_before_book = $request->know_before_book;

        $dataItem->save();

        flash('Successfully Added')->success();

        return redirect()->route('items.show', str_slug($request->category_slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Company\Egytat  $egytat
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $categories = Item::where('category_slug', $category)->groupBy('sub_category_slug')->get();
        if(count($categories) < 1) {
          $categories = collect([(object)[
            "category" => ucwords(str_replace('-', ' ', $category)),
            "category_slug" => $category,
            "sub_category_slug" => ""
          ]]);
        }
        return view('admin.items.category', [
            'categories' => $categories
        ]); 
    }

    public function showItem($category,$subCategory='')
    {
        $categories = Item::where('category_slug', $category)->groupBy('sub_category_slug')->get();

        $items = Item::where('sub_category_slug', $subCategory)
                      ->where('category_slug', $category)
                      ->get();

        return view('admin.items.category', [
            'categories' => $categories,
            'items' => $items
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Company\Egytat  $egytat
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $lang = $request->lang ?? 'en';
        $item = Item::findOrFail($id);
        $categories = \DB::table('categories')
                          ->where('category_slug', $item->category_slug)
                          ->orderBy('sub_category')
                          ->get();
        $itemData = $item->dataItem->where('languagecode', $lang)->first();
        return view('admin.items.item', [
          'item' => $item, 
          'lang' => $lang,
          'categories' => $categories,
          'itemData' => $itemData
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Company\Egytat  $egytat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        if($file=$request->file('logo')){               
                
            $handle = new UploadClass($file);
            if ($handle->uploaded) {
              $handle->image_resize         = true;
              $handle->image_ratio_y        = true;
              $handle->image_x              = 900;
              $handle->process('images/items');
              if ($handle->processed) {
                \File::delete('images/items/'. $item->logo);
                $massage = 'image resized';
                $name=$handle->file_dst_name;
                $handle->clean();
              } else {
                $massage = 'error : ' . $handle->error;
              }
            }      
            $item->logo = $name;
        }
        
        if($gallary=$request->file('file')){

            foreach($gallary as $singleimg){
                
                $handle = new UploadClass($singleimg);
                if ($handle->uploaded) {
                  $handle->image_resize         = true;
                  $handle->image_ratio_y        = true;
                  $handle->image_x              = 900;
                  $handle->process('images/items');
                  if ($handle->processed) {
                    $massage = 'image resized';
                    $g_name[]=$handle->file_dst_name;
                    $handle->clean();
                  } else {
                    $massage = 'error : ' . $handle->error;
                  }
                }
            }

            if (!$item->images) {
                $imgs = implode("|",$g_name);
            } else {
                $imgs = $item->images .'|'. implode("|",$g_name);
            }

            $item->images = $imgs;
            
        }
        
        $item->book_url = $request->book_url;
        $item->price = $request->price;
        $item->currency_id = $request->currency_id;
        $item->category = $request->category;
        $item->category_slug = $request->category_slug;
        $item->sub_category = $request->sub_category;
        $item->sub_category_slug = str_slug($request->sub_category);
        $item->layout = $request->layout;
        $item->save();

        ItemData::updateOrCreate([
          "item_id" => $item->id,
          "languagecode" => $request->languagecode 
        ],[
          "name" => $request->name,
          "name_slug" => str_slug($request->name),
          "duration" => $request->duration,
          "locations" => $request->locations,
          "short_description" => $request->short_description,
          "highlights" => $request->highlights,
          "description" => $request->description,
          "day_by_day" => $request->day_by_day,
          "inclusions" => $request->inclusions,
          "exclusions" => $request->exclusions,
          "details" => $request->details,
          "flights_transport" => $request->flights_transport,
          "group_size" => $request->group_size,
          "accommodations" => $request->accommodations,
          "cancellation_policy" => $request->cancellation_policy,
          "additional_info" => $request->additional_info,
          "know_before_book" => $request->know_before_book
        ]);

        flash('Successfully Update')->success();

        return redirect()->route('items.show', str_slug($request->category_slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Company\Egytat  $egytat
     * @return \Illuminate\Http\Response
     */
    public function destroy($egytat)
    {
        $item = Item::findOrFail($egytat);

        \File::delete('images/items/'. $item->logo);
        foreach (explode("|", $item->images) as $value) {
            \File::delete('images/items/'. $value);
        }

        $company = $item->category_slug;
        $category = $item->sub_category_slug;

        $item->delete();

        flash('Successfully Deleted')->success();

        return $this->showItem($company,$category);
    }

    public function items_delimg(Request $request)
    {
        $item = Item::find($request->id);

        $item->images = str_replace($request->img.'|', '', $item->images);
        $item->images = str_replace('|'.$request->img, '', $item->images);
        $item->images = str_replace($request->img, '', $item->images);

        $item->save();

        if(\File::delete('images/items/'. $request->img)){
          return 'ok';
        } else {
          return 'no';
        }

        
    }
}
