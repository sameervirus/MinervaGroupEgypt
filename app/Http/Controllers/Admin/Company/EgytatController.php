<?php

namespace App\Http\Controllers\Admin\Company;

use App\Admin\Company\Egytat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\UploadClass;

class EgytatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.company.egytat', ['categories' => Egytat::get_category()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.e_egytat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Egytat;

        if($file=$request->file('logo')){               
                
            $handle = new UploadClass($file);
            if ($handle->uploaded) {
              $handle->image_resize         = true;
              $handle->image_ratio_y        = true;
              $handle->image_x              = 900;
              $handle->process('images/egytat');
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
                  $handle->process('images/egytat');
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

        return redirect()->route('egytat.show', str_slug($request->slug_category));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Company\Egytat  $egytat
     * @return \Illuminate\Http\Response
     */
    public function show($egytat)
    {
        return view('admin.company.egytat', [
            'categories' => Egytat::get_category(),
            'items' => Egytat::where('slug_category', $egytat)->get()
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Company\Egytat  $egytat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Egytat::findOrFail($id);
        return view('admin.company.e_egytat', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Company\Egytat  $egytat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $egytat)
    {
        $item = Egytat::findOrFail($egytat);

        if($file=$request->file('logo')){               
                
            $handle = new UploadClass($file);
            if ($handle->uploaded) {
              $handle->image_resize         = true;
              $handle->image_ratio_y        = true;
              $handle->image_x              = 900;
              $handle->process('images/egytat');
              if ($handle->processed) {
                \File::delete('images/egytat/'. $item->logo);
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
                  $handle->process('images/egytat');
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

        return redirect()->route('egytat.show', str_slug($request->category));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Company\Egytat  $egytat
     * @return \Illuminate\Http\Response
     */
    public function destroy($egytat)
    {
        $item = Egytat::findOrFail($egytat);

        \File::delete('images/egytat/'. $item->logo);
        foreach (explode("|", $item->images) as $value) {
            \File::delete('images/egytat/'. $value);
        }

        $category = $item->slug_category;

        $item->delete();

        flash('Successfully Deleted')->success();

        return $this->show($category);
    }

    public function egytat_delimg(Request $request)
    {
        $item = Egytat::find($request->id);

        $item->images = str_replace($request->img.'|', '', $item->images);
        $item->images = str_replace('|'.$request->img, '', $item->images);
        $item->images = str_replace($request->img, '', $item->images);

        $item->save();

        \File::delete('images/egytat/'. $request->img);

        flash('Successfully Deleted')->success();

        return back();
    }
}
