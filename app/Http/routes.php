<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', 'HomeController@index');
Route::get('home/activate/{userId}/{active}/{code}','HomeController@activate');
Route::get('ConfirmEmail', 'HomeController@confirm_email');

Route::group(['middlewareGroups' => ['web']], function () {
	Route::auth();
	
	Route::post('/subscribe', 'HomeController@subscribe');
	Route::post('/hold_register', 'HomeController@hold_register');
});

//Route without user loggedin
Route::group(['middleware' => ['web']], function () {

	Route::get('payment/link', 'PaymentController@payment_link');
	Route::get('payment/form', 'PaymentController@form');
	Route::post('payment/pay', 'PaymentController@pay');

	

	//homepage ajax call
	Route::get('/home/get_categories', 'HomeController@get_categories');
	
	//Social redirect routes
	Route::get('social/auth/redirect/{provider}', 'Auth\AuthController@redirectToProvider');
	Route::get('social/auth/{provider}', 'Auth\AuthController@handleProviderCallback');
	
	//Quickpay Callback Routes
	Route::match(['get', 'post'], '/ad/callback', 'AdController@payment_callback');
	
	//Ads Routes
	Route::get('/ad/search', 'AdController@search');
	Route::get('/ad/get_ads', 'AdController@get_ads');
	Route::get('/ad/{ad?}/detail', 'AdController@detail');

	//Profile Routes
	Route::get('/profile/search', 'ProfileController@search');
	Route::get('/profile/get_search_users', 'ProfileController@get_search_users');
	Route::get('/profile/popular', 'ProfileController@popular');
	Route::get('/profile/get_popular_users', 'ProfileController@get_popular_users');
	Route::get('/profile/newer', 'ProfileController@newer');
	Route::get('/profile/get_newer_users', 'ProfileController@get_newer_users');
	Route::get('/profile/user/{user?}', 'ProfileController@otherUser');
	Route::get('/profile/user/{user}/experience', 'ProfileController@getExperiences');
	Route::get('/profile/user/{user}/review', 'ProfileController@getReviews');
	
	//Catgeory Routes
	Route::get('/category/{category?}', 'CategoryController@index');
	Route::get('/category/get_ads/{category?}', 'CategoryController@get_ads');
	
	Route::post('/category/filter', 'CategoryController@filter_by_skills');
	//Pages Routes
	Route::get('p/{name}', 'PageController@common_page_router');
	Route::get('contact-us', 'PageController@contact');
	Route::get('kontakt-os', 'PageController@contact');
	
	Route::post('contact-us/send', 'PageController@contact_send');
	
	/*-----
	|	THESE PAGES ARE NOW DYNAMIC 
	Route::get('cookie-politik', 'PageController@cookie_politik');
	Route::get('tillidsbarometer', 'PageController@tillidsbarometer');
	
	
	Route::get('about-us', 'PageController@about');
	Route::get('om-swappi', 'PageController@help');
	Route::get('ledige-stillinger', 'PageController@vacancies');
	Route::get('presse', 'PageController@press');
	Route::get('safe-swappi', 'PageController@safe_swappi');
	Route::get('handelsbetingelser', 'PageController@safe_swappi');
	Route::get('terms-of-use', 'PageController@terms_of_use');
	Route::get('Brugervilkår', 'PageController@terms_of_use');
	Route::get('rules-for-advertising', 'PageController@rules_for_advertising');
	Route::get('regler-for-annoncering', 'PageController@rules_for_advertising');
	Route::get('privacy-policy', 'PageController@privacy_policy');
	Route::get('Fortrolighedspolitik', 'PageController@privacy_policy');
	Route::get('tilfredshedsbarometer', 'PageController@tilfredsbarometer'); */
	
	Route::get('blog', 'PageController@blog');
	Route::get('webshops', 'PageController@webshops');
	Route::get('admanager', 'PageController@admanager');
	Route::get('banner-ads', 'PageController@banner_ads');
	Route::get('business', 'PageController@business');
	Route::get('hvorfor-swappi', 'PageController@hvorfor_swappi');
});

Route::get('success/{orderid}','AdController@success');
Route::get('cancel/{orderid}','AdController@cancel');
Route::match(['get', 'post'], 'callback', [
	'as' => 'payment', 'uses' => 'AdController@callback'
	]);


//Routes under auth (if user loggedin) 
Route::group(['middleware' => [ 'auth']], function () {
	
	//Ad Routes
	Route::get('ad/iframe/{order}/{amount}/{payment}', 'AdController@iframe');
	Route::get('/ad/create', 'AdController@create');
	Route::post('/ad/save_images', 'AdController@save_images');
	Route::post('/ad/save', 'AdController@save');
	Route::post('/ad/favorite', 'AdController@addToFavorite');
	Route::get('/ads/', ['as' => 'ads', 'uses' => 'AdController@index']);
	Route::get('/ads/active', 'AdController@active_ads');
	Route::get('/ads/inactive', 'AdController@inactive_ads');
	
	Route::get('/ad/{ad?}/edit', 'AdController@edit');
	Route::post('/ad/update', 'AdController@update');
	Route::post('ad/markimage', 'AdController@mark_image');
	Route::post('ad/makeswap', 'AdController@make_swap');
	Route::get('ad/accept_swap/{ad_id}/{owner_id}/{swaper_id}', 'AdController@accept_swap');
	Route::get('ad/deny_swap/{ad_id}/{owner_id}/{swaper_id}', 'AdController@deny_swap');
	Route::post('ad/post_review', 'AdController@post_review');
	Route::post('ad/skip_review', 'AdController@skip_review');
	
	Route::get('ad/get_category/{skill}', 'AdController@get_category_skill');
	
	/////////////////////
	Route::post('/ad/get_payment_link', 'AdController@get_payment_link');
	Route::post('/ad/payment_authorize', 'AdController@call_authorize');
	
	Route::get('/process_order/{ad_id}/{order_id}', 'AdController@get_order_details');
	
	/////////////////////
	
	//Route::post('/ad/payment_filter', 'AdController@payment_filter');	//Quickpay test
	Route::match(['get', 'post'], '/ad/payment_filter', [
		'as' => 'payment', 'uses' => 'AdController@payment_filter'
	]);		//Quickpay test
	Route::get('/ad/continue', 'AdController@payment_continue');
	Route::get('/ad/cancel', 'AdController@payment_cancel');
		
	//Category Routes
	Route::post('/category/search', 'CategoryController@search');
	Route::post('/category/skills', 'CategoryController@skills');
		
	//Profile Routes
	Route::get('/profile/', 'ProfileController@index');
	Route::post('/profile/update', 'ProfileController@update');
	Route::post('/profile/project/save', 'ProfileController@projectSave');
	Route::post('/profile/certificate/save', 'ProfileController@certificateSave');
	Route::post('/profile/experience/save', 'ProfileController@experienceSave');
	Route::post('/profile/training/save', 'ProfileController@trainingSave');
	Route::get('/profile/request/{to_user}', 'ProfileController@send_request');
	Route::get('/profile/accept/{follower_id}', 'ProfileController@accept_request');
	Route::get('/profile/deny/{follower_id}', 'ProfileController@deny_request');
	Route::post('/profile/favorite', 'ProfileController@addToFavorite');
		
	//Message Routes
	Route::get('/message', 'MessageController@users');
	Route::post('/message/save', 'MessageController@save');
	Route::get('/message/user/{user}', 'MessageController@messages');
	Route::get('/message/delete/{user}', 'MessageController@delete');
	Route::get('/message/unread/{user}', 'MessageController@unread');
	
});

//Admin routes
Route::group(['middlewareGroups' => ['web', 'auth'], 'middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'admin'], function () {

	//Edit Profile routes 
	Route::get('/', 'UserController@profile');
	Route::get('profile', 'UserController@profile');
	Route::post('profile/save', 'UserController@profileSave');
	
	//Manage Ads routes
	Route::get('ads', 'AdController@index');
	Route::get('ad/edit/{adid}', 'AdController@edit');
	Route::post('ad/save', 'AdController@save');
	Route::post('ad/markimage', 'AdController@mark_image');
	
	//Manage Categories routes
	Route::get('categories', 'CategoryController@index');
	Route::get('category/create', 'CategoryController@create');
	Route::get('category/edit/{catid}', 'CategoryController@edit');
	Route::post('category/save', 'CategoryController@save');
	
	//Manage Skills routes
	Route::get('skills', 'SkillController@index');
	Route::get('skill/create', 'SkillController@create');
	Route::get('skill/edit/{skillid}', 'SkillController@edit');
	Route::post('skill/save', 'SkillController@save');
	
	//Manage Users routes
	Route::get('users', 'UserController@index');
	Route::get('user/edit/{userid}', 'UserController@edit');
	Route::post('user/save', 'UserController@save');
	
	//Transaction routes
	Route::get('payments', 'PaymentController@index');
	
	//Manage package routes
	Route::get('packages', 'PackageController@index');
	Route::get('package/edit/{packageid}', 'PackageController@EditPackage');
	Route::post('package/save', 'PackageController@save');
	
	//Manage pages routes
	Route::get('pages', 'PagesController@index');
	Route::get('page/edit/{page_id}', 'PagesController@EditPage');
	Route::post('page/save/', 'PagesController@SavePage');
});
