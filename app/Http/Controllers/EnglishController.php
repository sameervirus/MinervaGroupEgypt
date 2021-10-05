<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Admin\Company\HealthCare;
use App\Admin\Company\TravelTour;
use App\Admin\Company\ShandaLodge;
use App\Admin\Company\Egytat;

use App\Admin\Items\Item;
use App\Admin\Items\ItemData;
use App\Admin\Items\Category;
use App\WishList;
use App\Order;
use App\Feed;

use App\Http\Requests\ReCaptchataTestFormRequest;

use Auth;

class EnglishController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {        
        $slider = \App\Admin\Slide\Slider::all();
        return view('en.home', ['slider' => $slider, 'page' => 'home' ]);
    }

    public function about()
    {
        return view('en.about', ['page' => 'about']);
    }

    public function mission()
    {
        return view('en.mission', ['page' => 'mission']);
    }

    public function vision()
    {
        return view('en.vission', ['page' => 'vision']); 
    }
    
    public function products()
    {
        return view('en.products', ['page' => 'products']);
    }

    public function contacts()
    {
        $site_content = \App\Admin\SiteContent\Sitecontent::pluck('content', 'code');
        return view('en.contacts', ['site_content' => $site_content,'page' => 'contacts']);
    }


    public function healthcare($items)
    {
        $site_content = \App\Admin\SiteContent\Sitecontent::pluck('content', 'code');

        $data = HealthCare::where('slug_category', $items)->paginate(10);

        $os = array("hospitals", "medical-centers", "doctors");
        
        if (in_array($items, $os)) {
            return view('en.list', [
                'page' => 'healthcare',
                'site_content' => $site_content,
                'submenu' => $items,
                'items' => $data
            ]);
        } else {
            return view('en.gird', [
                'page' => 'healthcare',
                'site_content' => $site_content,
                'submenu' => $items,
                'items' => $data
            ]);            
        }
        
    }

    public function healthcare_child($items, $item)
    {
        $site_content = \App\Admin\SiteContent\Sitecontent::pluck('content', 'code');

        $data = HealthCare::where('slug', $item)->first();

        $os = array("hospitals", "medical-centers", "doctors");

        if (in_array($items, $os)) {
            return view('en.blog_logo', [
                'page' => 'healthcare',
                'site_content' => $site_content,
                'submenu' => $items,
                'item' => $data
            ]);
        } else {
            return view('en.blog_image', [
                'page' => 'healthcare',
                'site_content' => $site_content,
                'submenu' => $items,
                'item' => $data
            ]);            
        }

    }

    //Tours

    public function traveltours($layout, $item)
    {
        $site_content = \App\Admin\SiteContent\Sitecontent::pluck('content', 'code');

        $os = array("company-profile");

        if ($layout == 'd') {
            if (in_array($item, $os)) {
                $layout = 's';
            } else {
                $layout = 'g';
            } 
        }

        switch ($layout) {
            case 's':
                $data = TravelTour::where('slug_category', $item)->first();
                return view('en.traveltours.single', [
                    'page' => 'traveltours',
                    'submenu' => $item,
                    'site_content' => $site_content,
                    'item' => $data 
                ]);
                break;
            
            case 'g':
                $data = TravelTour::where('slug_category', $item)->paginate(10);
                return view('en.traveltours.grid', [
                    'page' => 'traveltours',
                    'submenu' => $item,
                    'site_content' => $site_content,
                    'items' => $data 
                ]);
                break;

            case 'i':
                $data = TravelTour::where('slug', $item)->first();
                return view('en.traveltours.single', [
                    'page' => 'traveltours',
                    'submenu' => $data->slug_category,
                    'site_content' => $site_content,
                    'item' => $data 
                ]);
                break;

            default:
                # code...
                break;
        }
    }

    public function shandalodge($layout, $item)
    {
        $site_content = \App\Admin\SiteContent\Sitecontent::pluck('content', 'code');

        $os = array("egypt", "company-profile", "contact-us","our-services","location");

        if ($layout == 'd') {
            if (in_array($item, $os)) {
                $layout = 's';
            } else {
                $layout = 'g';
            }
        }

        switch ($layout) {
            case 's':
                $data = ShandaLodge::where('slug_category', $item)->first();
                return view('en.shandalodge.single', [
                    'page' => 'shandalodge',
                    'submenu' => $item,
                    'site_content' => $site_content,
                    'item' => $data 
                ]);
                break;
            
            case 'g':
                $data = ShandaLodge::where('slug_category', $item)->paginate(10);
                return view('en.shandalodge.grid', [
                    'page' => 'shandalodge',
                    'submenu' => $item,
                    'site_content' => $site_content,
                    'items' => $data 
                ]);
                break;

            case 'i':
                $data = ShandaLodge::where('slug', $item)->first();
                return view('en.shandalodge.single', [
                    'page' => 'shandalodge',
                    'submenu' => $data->slug_category,
                    'site_content' => $site_content,
                    'item' => $data 
                ]);
                break;

            default:
                # code...
                break;
        }
    }

    public function egytat($layout, $item)
    {
        $site_content = \App\Admin\SiteContent\Sitecontent::pluck('content', 'code');

        $os = array("about-us", "our-vision", "our-mission");

        if ($layout == 'd') {
            if (in_array($item, $os)) {
                $layout = 's';
            } else {
                $layout = 'g';
            }
        }

        switch ($layout) {
            case 's':
                $data = Egytat::where('slug_category', $item)->first();
                return view('en.egytat.single', [
                    'page' => 'egytat',
                    'submenu' => $item,
                    'site_content' => $site_content,
                    'item' => $data 
                ]);
                break;
            
            case 'g':
                $data = Egytat::where('slug_category', $item)->paginate(10);
                return view('en.egytat.grid', [
                    'page' => 'egytat',
                    'submenu' => $item,
                    'site_content' => $site_content,
                    'items' => $data 
                ]);
                break;

            case 'i':
                $data = Egytat::where('slug', $item)->first();
                return view('en.egytat.single', [
                    'page' => 'egytat',
                    'submenu' => $data->slug_category,
                    'site_content' => $site_content,
                    'item' => $data 
                ]);
                break;

            default:
                # code...
                break;
        }
    }

    public function company($company,$category,$lang='en')
    {
        $site_content = \App\Admin\SiteContent\Sitecontent::pluck('content', 'code');
        $items  = Item::where('category_slug', $company)->where('sub_category_slug', $category)->paginate(10);
        // if($category == 'introduction') dd($items);
        if(count($items) < 1) abort(404);
        $layout = Category::where('sub_category', $category)->first()->layout;
        $dataItem = $items[0]->dataItem()->where('languagecode', $lang)->first();
        // if($category == 'introduction') dd($dataItem);

        $logos = [
            'minerva-healthcare-medical-tourism' => 'healthcare',
            'minerva-travel-tours' => 'traveltours',
            'shanda-lodge' => 'shandalodge',
            'minerva-business-development-for-economics-trade' => 'business',
            'egytat' => 'egytat'];
        $subdata['topbar'] = $logos[$company];
        $subdata['logo'] = $site_content[$logos[$company]];

        $submenu = $this->submenu($company,$category);

        $wishlist = WishList::getWish();

        switch ($layout) {
            case 'one':
                return view('en.items.single', [
                    'page' => $company,
                    'submenu' => $submenu,
                    'subdata' => $subdata,
                    'item' => $items[0],
                    'dataItem' => $dataItem,
                    'wishlist' => $wishlist
                ]);
                break;

            case 'list':
                return view('en.items.list', [
                    'page' => $company,
                    'submenu' => $submenu,
                    'subdata' => $subdata,
                    'items' => $items,
                    'lang' => $lang,
                    'wishlist' => $wishlist
                ]);
                break;

            case 'grid':
                return view('en.items.grid', [
                    'page' => $company,
                    'submenu' => $submenu,
                    'subdata' => $subdata,
                    'items' => $items,
                    'lang' => $lang,
                    'wishlist' => $wishlist
                ]);
                break;

            case 'expedia':
                return view('en.items.colgrid', [
                    'page' => $company,
                    'submenu' => $submenu,
                    'subdata' => $subdata,
                    'items' => $items,
                    'lang' => $lang,
                    'wishlist' => $wishlist
                ]);
                break;
            
            default:
                # code...
                break;
        }
    }

    public function item($company,$category,$item,Request $request)
    {
        $lang = $request->lang ?? 'en';

        $english_name = ItemData::join('items','items.id','=','item_id')->where('name_slug', $item)->where('items.sub_category_slug', $category)->firstOrFail();        
        $site_content = \App\Admin\SiteContent\Sitecontent::pluck('content', 'code');
        $data = ItemData::where('item_id', $english_name->item_id)->where('languagecode', $lang)->firstOrFail();


        $datax = $data->getItem;

        if($datax->category_slug != $company || $datax->sub_category_slug != $category) abort(404);

        $languages = ItemData::where('item_id', $datax->id)->pluck('languagecode');        

        $logos = [
            'minerva-healthcare-medical-tourism' => 'healthcare',
            'minerva-travel-tours' => 'traveltours',
            'shanda-lodge' => 'shandalodge',
            'minerva-business-development-for-economics-trade' => 'business',
            'egytat' => 'egytat'];
        $subdata['topbar'] = $logos[$datax->category_slug];
        $subdata['logo'] = $site_content[$logos[$datax->category_slug]];
        $subdata['languages'] = $languages;

        $submenu = $this->submenu($company,$category);

        $wishlist = WishList::getWish();

        if (@$datax->price) {
            $currency = $datax->currency->name ?? 'EUR';
            $datax->egpPrice = $this->convertCurrency(preg_replace("/[^0-9]/", "", $datax->price), $currency ,'EGP');
        }
        
        
        switch ($datax->layout) {
            case 'expedia':
                return view('en.items.expedia', [
                    'page' => $company,
                    'submenu' => $submenu,
                    'subdata' => $subdata,
                    'item' => $datax,
                    'dataItem' => $data,
                    'wishlist' => $wishlist
                ]);
                break;
            
            default:
                return view('en.items.single', [
                    'page' => $company,
                    'submenu' => $submenu,
                    'subdata' => $subdata,
                    'item' => $datax,
                    'dataItem' => $data,
                    'wishlist' => $wishlist
                ]);
                break;
        }
    }

    public function submenu($company, $category)
    {
        $categories = Category::where('category_slug', $company)->orderBy('sort')->get();

        foreach ($categories as $value) {
            if($value->menu == '#') {
                $menu[$value->sub_category] = $value->sub_category;
            } else {
                $menu[$value->menu][] = $value->sub_category;
            }
        }
        $nav = '<div id="subMenu"><ul class="nav nav-fill">';
        foreach ($menu as $key => $val) {
            if(is_array($val)) {
                $nav .= '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">'.$key.'</a><div class="dropdown-menu">';
                foreach ($val as $sub) {
                    $active = $category == str_slug($sub) ? ' active':'';
                    $nav .= '<a class="dropdown-item '. $active .'" href="'. route('company',[$company,$sub]) .'">'. ucwords(str_replace('-', ' ', $sub)) .'</a>';
                }

                $nav .= '</li>';
            } else {
                $active = $category == str_slug($val) ? ' p-active':'';
                $nav .= '<li class="nav-item '.$active.'"><a class="nav-link" href="'. route('company',[$company,$val]) .'">'. ucwords(str_replace('-', ' ', $val)) .'</a></li>';
            }
        }

        $nav .= '</ul></div><div class="clearfix"></div>';

        return $nav;
    }

    public function wishlist(Request $request)
    {
        if(Auth::guard('web')->check()) {
            if($request->ckb == 'true') {
                WishList::create([
                    'user_id' => Auth::user()->id,
                    'item_id' => $request->item_id
                ]);
            } else {
                $item = WishList::where('user_id', Auth::user()->id)
                                ->where('item_id', $request->item_id);
                $item->delete();
            }
            return 'ok';
        } else {
            return 'no';
        }
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $results = ItemData::where('name', 'like', "%{$q}%")
                ->orWhere('locations', 'like', "%{$q}%")
                ->orWhere('short_description', 'like', "%{$q}%")
                ->orWhere('highlights', 'like', "%{$q}%")
                ->orWhere('description', 'like', "%{$q}%")
                ->orWhere('day_by_day', 'like', "%{$q}%")
                ->orWhere('inclusions', 'like', "%{$q}%")
                ->orWhere('exclusions', 'like', "%{$q}%")
                ->orWhere('details', 'like', "%{$q}%")
                ->orWhere('flights_transport', 'like', "%{$q}%")
                ->orWhere('group_size', 'like', "%{$q}%")
                ->orWhere('accommodations', 'like', "%{$q}%")
                ->orWhere('cancellation_policy', 'like', "%{$q}%")
                ->orWhere('additional_info', 'like', "%{$q}%")
                ->orWhere('know_before_book', 'like', "%{$q}%")
                ->pluck('item_id');
        $items = Item::whereIn('id', $results)->where('category_slug','minerva-travel-tours')->paginate(10);

        $wishlist = WishList::getWish();

        return view('en.items.search', [
            'items' => $items,
            'q' => $q,
            'lang' => 'en',
            'page' => '',
            'wishlist' => $wishlist
        ]);
    }

    // Send Email
    public function feed(ReCaptchataTestFormRequest $request)
    { 

        $this->validate(request(), [
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'client_message' => 'required'
        ]);
                
        $this->to = \App\Admin\SiteContent\Sitecontent::where('code','=','email')->value('content');

        $this->email = $request->email;
        $this->name = $request->name;

        $data = array_except($request->all(), ['_token']);
        
        //$this->to = 'admin@minervagroupegypt.com';
        try{
            Feed::create([
                'type' => 'contactus',
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'client_message' => $request->client_message
            ]);
            \Mail::send('admin.email', $data, function($message) {
             $message->to($this->to)->bcc('sales@raindesigner.com')->subject('Feed Back from Website');
             $message->from($this->email, $this->name);
             
            });
        }
        catch(\Exception $e){
            return $e;
        }
        
        return back()->with('feedback','sucsses');
    }


    // Send Email to Friend
    public function send_friend(ReCaptchataTestFormRequest $request)
    { 

        $this->validate(request(), [
            'friendEmail' => 'required|email',
            'email' => 'required|email',
            'name' => 'required'
        ]);
                
        $this->to = \App\Admin\SiteContent\Sitecontent::where('code','=','email')->value('content');

        $this->email = $request->email;
        $this->name = $request->name;

        $data = array_except($request->all(), ['_token']);

        // $this->to = 'admin@minervagroupegypt.com';
        $this->to = $request->friendEmail;
        try{
            Feed::create([
                'type' => 'send_friend',
                'name' => $request->name,
                'email' => $request->email,
                'email_friend' => $request->friendEmail,
                'name_friend' => $request->friendName,
                'link' => $request->post
            ]);
            \Mail::send('admin.friend', $data, function($message) {
             $message->to($this->to)->bcc('sales@raindesigner.com')->subject('Minerva Travel & Tours');
             $message->from('admin@minervagroupegypt.com', $this->name);
             
            });
        }
        catch(\Exception $e){
            return $e;
        }
        
        return back()->with('friend','sucsses');
    }


    public function booknow(Item $item)
    {
        $lang = $request->lang ?? 'en';
        $itemData = $item->dataItem->where('languagecode', $lang)->first();

        $currency = $item->currency->name ?? 'EUR';
        $item->egpPrice = $this->convertCurrency(preg_replace("/[^0-9]/", "", $item->price),$currency,'EGP');

        return view('en.book', [
            'item'=>$item,
            'itemData'=>$itemData,
            'page' => 'book'
        ]);
    }

    public function book(Request $request, Item $item)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'travels' => 'required'
        ]);
        $currency = $item->currency->name ?? 'EUR';
        $item->egpPrice = $this->convertCurrency(preg_replace("/[^0-9]/", "", $item->price),$currency,'EGP');

        $order = Order::create([
            'item_id' => $item->id, 
            'firstname' =>$request->firstname, 
            'lastname' =>$request->lastname, 
            'phone' =>$request->phone, 
            'email' =>$request->email, 
            'price' => $request->travels * $item->egpPrice, 
            'comments' =>$request->name
        ]);

        if($order) {
            return redirect()->route('payment', $order->id);
        }
    }

    public function convertCurrency($amount,$from_currency,$to_currency){
      $apikey = '018423a138ae24f01f3d';

      $from_Currency = urlencode($from_currency);
      $to_Currency = urlencode($to_currency);
      $query =  "{$from_Currency}_{$to_Currency}";

      // change to the free URL if you're using the free version
      $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
      $obj = json_decode($json, true);

      $val = floatval($obj["$query"]);


      $total = $val * $amount;
      return number_format($total, 2, '.', '');
    }

}
