<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'EnglishController@home');
Route::get('/home', 'EnglishController@home')->name('home');
Route::get('/our-group', 'EnglishController@about')->name('about');
Route::get('/mission', 'EnglishController@mission')->name('mission');
Route::get('/vision', 'EnglishController@vision')->name('vision');
Route::get('/contact-us', 'EnglishController@contacts')->name('contacts');

// Route::get('/minerva-healthcare-medical-tourism/{items}', 'EnglishController@healthcare')->name('healthcare');
// Route::get('/minerva-healthcare-medical-tourism/{items}/{item}', 'EnglishController@healthcare_child')->name('healthcare-child');

// Route::get('/minerva-travel-tours/{layout}/{items}', 'EnglishController@traveltours')->name('traveltours');

// Route::get('/shanda-lodge/{layout}/{items}', 'EnglishController@shandalodge')->name('shandalodge');
// Route::get('/egytat/{layout}/{items}', 'EnglishController@egytat')->name('egytat');

Route::post('/feedback', 'EnglishController@feed')->name('feed');
Route::post('/send-friend', 'EnglishController@send_friend')->name('send_friend');

Route::get('/view/{company}/{categry}','EnglishController@company')->name('company');
Route::get('/view/{company}/{category}/{item}','EnglishController@item')->name('item');

Route::get('/view/search','EnglishController@search')->name('search');


Route::get('/booking/{item}','EnglishController@booknow')->name('booknow');
Route::post('/booking/{item}','EnglishController@book')->name('book');

Route::get('/payment/{order}', 'PayMobController@checkingOut')->name('payment');
Route::post('/payment', 'PayMobController@processedCallback');
Route::get('/payment-done', 'PayMobController@invoice');

Auth::routes();

Route::get('/artisan', function() {
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('cache:clear');
    return 'what you want';
});

Route::post('/view/wishlist', 'EnglishController@wishlist')->name('withlist');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

// Account Routes
Route::get('/account', 'HomeController@index')->name('account');
Route::get('/wishs', 'HomeController@wishs')->name('wishs');
Route::put('/account', 'HomeController@update')->name('updateuser');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function() {
    /*
    | example
    | Route::get('/', function () { return view('welcome'); });    
    | Route::get('/editor', function () { return view('welcome'); })->middleware('role:editor');
    | Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
    */

    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    
    Route::resource('slider', 'Admin\Slide\SliderController');  
    Route::resource('products', 'Admin\Products\ProductController');  
    Route::resource('sitecontent', 'Admin\SiteContent\SitecontentController');
    
    Route::resource('healthcare', 'Admin\Company\HealthCareController');
    Route::post('healthcare/delimg', 'Admin\Company\HealthCareController@delimg')->name('delimg');

    Route::resource('traveltours', 'Admin\Company\TravelTourController');
    Route::post('traveltours/delimg', 'Admin\Company\TravelTourController@traveltours_delimg')->name('traveltours_delimg');

    Route::resource('shandalodge', 'Admin\Company\ShandaLodgeController');
    Route::post('shandalodge/delimg', 'Admin\Company\ShandaLodgeController@shandalodge_delimg')->name('shandalodge_delimg');

    Route::resource('egytat', 'Admin\Company\EgytatController');
    Route::post('egytat/delimg', 'Admin\Company\EgytatController@egytat_delimg')->name('egytat_delimg');

    Route::post('/upload/img', 'Admin\AdminController@upload_img');

    Route::resource('companies', 'Admin\Items\CategoryController');

    Route::resource('items', 'Admin\Items\ItemsController')->except(['create']);
    Route::get('items/{categry}/create', 'Admin\Items\ItemsController@create')->name('creatItem');
    Route::get('items/{categry}/{sub_categry}', 'Admin\Items\ItemsController@showItem')->name('showItem');
    Route::post('items/delimg', 'Admin\Items\ItemsController@items_delimg')->name('items_delimg');

    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('feedback/{type}', 'Admin\AdminController@feedback')->name('users.feed');

});

Route::get('sitemap', function(){
    /* create new sitemap object */
    $sitemap = App::make("sitemap");
    

    /* add item to the sitemap (url, date, priority, freq) */
    $sitemap->add(URL::to('/'), '2018-05-29T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/our-group'), '2018-05-29T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/mission'), '2018-05-29T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/vision'), '2018-05-29T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/contact-us'), '2018-05-29T20:10:00+02:00', '1.0', 'daily');

    $healthcare = DB::table('health_cares')
                    ->select('slug', 'slug_category', 'created_at')
                    ->orderBy('created_at','desc')
                    ->get();    

    /* add every post to the sitemap */
    foreach ($healthcare as $one)
    {        
        $sitemap->add(URL::route('healthcare-child', ['items' => $one->slug_category, 'item' => $one->slug ]),$one->created_at, '1.0', 'daily');
    }

    $travel_tours = DB::table('travel_tours')
                    ->select('slug', 'slug_category', 'created_at')
                    ->orderBy('created_at','desc')
                    ->get();    

    /* add every post to the sitemap */
    foreach ($travel_tours as $two)
    {        
        $sitemap->add(URL::route('traveltours' , ['layout' => 'i', 'item' => $two->slug ]),$two->created_at, '1.0', 'daily');
    }

    $shanda_lodges = DB::table('shanda_lodges')
                    ->select('slug', 'slug_category', 'created_at')
                    ->orderBy('created_at','desc')
                    ->get();    

    /* add every post to the sitemap */
    foreach ($shanda_lodges as $three)
    {        
        $sitemap->add(URL::route('shandalodge' , ['layout' => 'i', 'item' => $three->slug ]),$three->created_at, '1.0', 'daily');
    }

    $egytats = DB::table('egytats')
                    ->select('slug', 'slug_category', 'created_at')
                    ->orderBy('created_at','desc')
                    ->get();    

    /* add every post to the sitemap */
    foreach ($egytats as $four)
    {        
        $sitemap->add(URL::route('egytat' , ['layout' => 'i', 'item' => $four->slug ]),$four->created_at, '1.0', 'daily');
    }
    

    /* show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf') */
    return $sitemap->render('xml');
});