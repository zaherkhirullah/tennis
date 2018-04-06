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
    Route::get( '/kiralayan/silindi',  'KiralayanController@silindi')->name("kiralayan.silindi");
    Route::get( '/rezervasyon/silindi','RezervasyonController@silindi')->name("rezervasyon.silindi");
    Route::get( '/kort/silindi',       'KortController@silindi')->name("kort.silindi");
    Route::get( '/servis/silindi',     'ServisController@silindi')->name("servis.silindi");
    Route::get( '/Acontacts/silindi',     'ContactsController@silindi')->name("Acontacts.silindi");
    
    Route::post( '/kiralayan/{kiralayan}/delete',  'KiralayanController@delete')->name("kiralayan.delete");
    Route::post( '/Acontacts/{Acontacts}/delete',  'ContactsController@delete')->name("Acontacts.delete");    
    Route::post( '/rezervasyon/{rezervasyon}/delete','RezervasyonController@delete')->name("rezervasyon.delete");
    Route::post( '/kort/{kort}/delete',       'KortController@delete')->name("kort.delete");
    Route::post( '/servis/{servis}/delete',     'ServisController@delete')->name("servis.delete");
   
    Route::get( '/kort/{kort}/tamir',     'KortController@tamir')->name("kort.tamir");
    Route::get( '/kort/{kort}/calistir',     'KortController@calistir')->name("kort.calistir");
    Route::get( '/kort/{kort}/rezervasyonlar',     'KortController@rezervasyonlar')->name("kort.rezervasyonlar");
   
<<<<<<< HEAD
    Route::get( '/servis/{servi}/tamir',     'ServisController@tamir')->name("servis.tamir");
    Route::get( '/servis/{servi}/calistir',     'ServisController@calistir')->name("servis.calistir");
    Route::get( '/servis/{servi}/rezervasyonlar',     'ServisController@rezervasyonlar')->name("servis.rezervasyonlar");
   
=======
    Route::get( '/servis/{servis}/tamir',     'ServisController@tamir')->name("servis.tamir");
    Route::get( '/servis/{servis}/calistir',     'ServisController@calistir')->name("servis.calistir");
    Route::get( '/servis/{servis}/rezervasyonlar',     'ServisController@rezervasyonlar')->name("servis.rezervasyonlar");

>>>>>>> 137ebf6942c7119eaaf5a3713eb25beaabddda4d
    
    Route::get( '/rezervasyon/simdiki','RezervasyonController@simdiki')->name("rezervasyon.simdiki");
    Route::get( '/rezervasyon/sonraki','RezervasyonController@sonraki')->name("rezervasyon.sonraki");
    Route::get( '/rezervasyon/gecmis','RezervasyonController@gecmis')->name("rezervasyon.gecmis");
    // Admin Resources
    Route::resource( '/rezervasyon','RezervasyonController');
    Route::resource( '/kort',       'KortController');
    Route::resource( '/kiralayan',  'KiralayanController');
    Route::resource( '/servis',     'ServisController');
    Route::resource( '/Acontacts',   'ContactsController');
    Route::resource( '/kortType',   'kortTypeController');    
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
    Route::get( '/', 'UserController@index')->name("user");
    // User Resources
    Route::resource( '/rezervasyons','RezervasyonController');

  });
});

/*
|=============================
|      --/ Home  Area /--      
|=============================
*/

  Route::group(['namespace' => 'Home'], function()
  {
    Route::get('/home',         'HomeController@index')->name('home'); // ana sayfa
    Route::get('/',         'HomeController@index')->name('home'); // ana sayfa
    Route::get('/rezervasyonAl', 'HomeController@rezervasyonAl')->name('rezervasyonAl'); // randevo alma sayfa 
    Route::get('/contacts',      'ContactsController@create')->name('contacts'); // contact sayfa 
    Route::post('/contacts',      'ContactsController@store')->name('p_contacts'); // contact sayfa 
    Route::get('/prices',        'HomeController@prices')->name('prices'); // kiralama fiyatlari
    Route::get('/aboutUs',       'HomeController@aboutUs')->name('aboutUs'); // hakkimizde
    Route::get('/terms',         'HomeController@terms')->name('terms'); // Kurallar
  });
<<<<<<< HEAD
});

Route::get('/', function () {
  return view('welcome');
})->name('homepage');














///////// edit /////
/// edit servis
//Route::get('/admin/servis/edit/{id}',[
//    'uses' => 'ServisController@edit',
//    'as' => 'servis.edit',
//    'namespace' => 'Admin'
//]);



//Route::get('admin/servis/create',[
//    'uses' => 'ServisController@create',
//    'as' => 'servis.create'
//]);
=======
>>>>>>> 137ebf6942c7119eaaf5a3713eb25beaabddda4d
