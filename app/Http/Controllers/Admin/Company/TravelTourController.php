<?php

namespace App\Http\Controllers\Admin\Company;

use App\Admin\Company\TravelTour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\UploadClass;

class TravelTourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.company.traveltours', ['categories' => TravelTour::get_category()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.e_traveltours');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new TravelTour;

        if($file=$request->file('logo')){               
                
            $handle = new UploadClass($file);
            if ($handle->uploaded) {
              $handle->image_resize         = true;
              $handle->image_ratio_y        = true;
              $handle->image_x              = 900;
              $handle->process('images/traveltours');
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
                  $handle->process('images/traveltours');
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
        
        $item->name = $request->name;
        $item->slug = str_slug($request->name);
        $item->category = $request->category;
        $item->slug_category = str_slug($request->category);
        $item->details = $request->details;

        $item->save();

        flash('Successfully Added')->success();

        return redirect()->route('traveltours.show', str_slug($request->slug_category));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\TravelTour\TravelTour  $travelTour
     * @return \Illuminate\Http\Response
     */
    public function show($traveltour)
    {
        return view('admin.company.traveltours', [
            'categories' => TravelTour::get_category(),
            'items' => TravelTour::where('slug_category', $traveltour)->get()
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\TravelTour\TravelTour  $travelTour
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TravelTour::findOrFail($id);
        return view('admin.company.e_traveltours', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\TravelTour\TravelTour  $travelTour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $travelTour)
    {
        $item = TravelTour::findOrFail($travelTour);

        if($file=$request->file('logo')){               
                
            $handle = new UploadClass($file);
            if ($handle->uploaded) {
              $handle->image_resize         = true;
              $handle->image_ratio_y        = true;
              $handle->image_x              = 900;
              $handle->process('images/traveltours');
              if ($handle->processed) {
                \File::delete('images/traveltours/'. $item->logo);
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
                  $handle->process('images/traveltours');
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
        
        $item->name = $request->name;
        $item->slug = str_slug($request->name);
        $item->category = $request->category;
        $item->slug_category = str_slug($request->category);
        $item->details = $request->details;

        $item->save();

        flash('Successfully Update')->success();

        return redirect()->route('traveltours.show', str_slug($request->category));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\TravelTour\TravelTour  $travelTour
     * @return \Illuminate\Http\Response
     */
    public function destroy($travelTour)
    {
        $item = TravelTour::findOrFail($travelTour);

        \File::delete('images/traveltours/'. $item->logo);
        foreach (explode("|", $item->images) as $value) {
            \File::delete('images/traveltours/'. $value);
        }

        $category = $item->slug_category;

        $item->delete();

        flash('Successfully Deleted')->success();

        return $this->show($category);
    }

    public function traveltours_delimg(Request $request)
    {
        $item = TravelTour::find($request->id);

        $item->images = str_replace($request->img.'|', '', $item->images);
        $item->images = str_replace('|'.$request->img, '', $item->images);
        $item->images = str_replace($request->img, '', $item->images);

        $item->save();

        \File::delete('images/traveltours/'. $request->img);

        flash('Successfully Deleted')->success();

        return back();
    }
}
