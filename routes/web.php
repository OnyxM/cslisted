<?php
	use App\City;
	use App\Posting;
	use App\Category;

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

Auth::routes(["verify"=>true]);
Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{id}-{slug}', 'HomeController@category')->name('category')->where('id', '[0-9]+');
Route::get('/{id}-{slug}', 'HomeController@city')->name('city')->where('id', '[0-9]+');
Route::get('/{city_id}-{city_slug}/{category_id}-{category_slug}', 'HomeController@cityCategory')
	->name('category_city')
	->where('category_id', '[0-9]+')
	->where('city_id', '[0-9]+');

Route::get("/profile/{slug}-{id}","User\UserController@profilePreview")->where('slug', '^[a-z0-9]+(?:-[a-z0-9]+)*')->name("profile.preview");

Route::get('/product/{id}-{slug}', 'HomeController@singlePosting')->name('single-posting');

Route::get('/cart/add/{id}', 'HomeController@addToCart')->name('add-cart');
Route::get('/cart/remove/{id}', 'HomeController@removeToCart')->name('remove-cart');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');
Route::resource('order', 'OrderController')->only('store','index');

Route::resource('posting','User\PostingController');
Route::post('/posting/storeMedia','PostingController@storeMedia')->name('posting.media.store');

Route::get("/compare/add/{id}","HomeController@addToCompare")->name("compare.add");
Route::get("/compare/remove/{id}","HomeController@removeToCompare")->name("compare.remove");
Route::get("/compare","HomeController@compare")->name("compare");

Route::get('migrate-seed',function(){
   Artisan::call('migrate:fresh --seed');
   Artisan::call('config:cache');
});

Route::get('config-cache',function(){
   Artisan::call('cache:clear');
   Artisan::call('clear-compiled');
      Artisan::call('config:cache');
});

Route::get('config',function(){
   print_r(config());
});


Route::get('key-generate',function(){
   Artisan::call('key:generate');
});

Route::get('view-cache',function(){
   Artisan::call('view:cache');
});

Route::get('view-clear',function(){
   Artisan::call('view:clear');
});

Route::get("sitemap.xml", array(
    "as"   => "sitemap",
    "uses" => "HomeController@sitemap", // or any other controller you want to use
));

Route::get('/page/{slug}', 'HomeController@page')->name('page');
Route::get('/search', 'HomeController@search')->name('search');

Route::get('/coming-soon', 'HomeController@commingSoon')->name('comming-soon');

Route::get('set-locale/{locale}', function ($locale) {
    if(in_array($locale,["en","fr"])){
        session(['my_locale' => $locale]);
    }
    return redirect()->back();
})->name("set-locale");

