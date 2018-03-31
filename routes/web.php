<?php

/*
|--------------------------------------------------------------------------
|     Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Auth::routes();

Route::group(['namespace' => 'Settings'], function()
{
  Route::get('lang/{lang}', 'LanguageController@index')->name('lang');
});

/*
|=============================
|      --/Account Area /--      
|=============================
*/
Route::prefix('account')->group(function()
{
  Route::group(['namespace' => 'Account'], function()
  {
    Route::get(  '/profile',         'AccountController@showprofile')->name("profile");
    Route::post( '/profile',         'AccountController@profile')->name("post_profile");
    Route::get( '/change-password',  'AccountController@showchangePassword')->name('changePassword');;
    Route::post('/change-password',  'AccountController@changePassword')->name('post_changePassword');
  });
});


/*
|=============================
|      --/ Admin Area /--      
|=============================
*/
Route::prefix('admin')->group(function()
{ 
  Route::group(['namespace' => 'Admin'], function()
  {
     // Admin 
    Route::get( '/', 'AdminController@index')->name("admin");
    // Admin Resources
    Route::resource( '/users',       'UserController');  
    Route::resource( '/roles',       'RoleController');
    Route::resource( '/rezervasyon','RezervasyonController');
    Route::resource( '/Kort',       'KortController');
    Route::resource( '/Kiralayan',  'KiralayanController');
    Route::resource( '/Servis',      'ServisController');
  });

});
/*
|=============================
|      --/ User Area /--      
|=============================
*/
Route::prefix('user')->group(function()
{ 
  Route::group(['namespace' => 'User'], function()
  {
     // User 
    Route::get( '/', 'UserController@index')->name("admin");
    // User Resources
    Route::resource( '/rezervasyons','RezervasyonController');

  });
});

/*
|=============================
|      --/ Home  Area /--      
|=============================
*/
Route::prefix('/')->group(function()
{
  Route::group(['namespace' => 'Home'], function()
  {
    Route::get('/home',         'HomeController@index')->name('home'); // ana sayfa
    Route::get('/rezervasyonAl', 'HomeController@rezervasyonAl')->name('rezervasyonAl'); // randevo alma sayfa 
    Route::get('/contacts',      'HomeController@contacts')->name('contacts'); // contact sayfa 
    Route::get('/prices',        'HomeController@prices')->name('prices'); // kiralama fiyatlari
    Route::get('/aboutUs',       'HomeController@aboutUs')->name('aboutUs'); // hakkimizde
    Route::get('/terms',         'HomeController@terms')->name('terms'); // Kurallar
  });
});

Route::get('/', function () {
  return view('welcome');
})->name('homepage');