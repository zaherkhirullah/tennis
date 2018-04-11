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
          Route::get ('/profile',         'AccountController@showprofile')->name("profile");
          Route::post('/profile',         'AccountController@profile')->name("post_profile");
          Route::get ('/change-password',  'AccountController@showchangePassword')->name('changePassword');;
          Route::post('/change-password',  'AccountController@changePassword')->name('post_changePassword');
        }
      );
    }
  );
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
   
    // list all_deleted kiralayanlar    
    Route::get( '/kiralayan/dlist',  'KiralayanController@all_deleted')->name("kiralayan.all_deleted");
    Route::get( '/kiralayan/{kiralayan}/delete',  'KiralayanController@delete')->name("kiralayan.delete");    
    
    Route::get( '/Acontacts/{Acontacts}/delete',  'ContactsController@delete')->name("Acontacts.delete");    
    Route::get( '/Acontacts/dlist',  'ContactsController@all_deleted')->name("Acontacts.all_deleted");
    
    // list all_deleted rezervasyonlar
    Route::get( '/rezervasyon/dlist','RezervasyonController@all_deleted')->name("rezervasyon.all_deleted");
    Route::get( '/rezervasyon/{rezervasyon}/delete','RezervasyonController@delete')->name("rezervasyon.delete");
    
    Route::get( '/kort/{kort}/tamir',         'KortController@tamir')->name("kort.tamir");
    Route::get( '/kort/{kort}/mesgul',        'KortController@mesgul')->name("kort.mesgul");
    Route::get( '/kort/{kort}/calistir',      'KortController@calistir')->name("kort.calistir");
    Route::get( '/kort/{kort}/rezervasyonlar','KortController@rezervasyonlar')->name("kort.rezervasyonlar");
    // list all_deleted Kortlar
    Route::get( '/kort/dlist',       'KortController@all_deleted')->name("kort.all_deleted");
    Route::get( '/kort/{kort}/delete',       'KortController@delete')->name("kort.delete");
   
    Route::get( '/servis/{servi}/tamir',         'ServisController@tamir')->name("servis.tamir");
    Route::get( '/servis/{servi}/mesgul',        'ServisController@mesgul')->name("servis.mesgul");
    Route::get( '/servis/{servi}/calistir',      'ServisController@calistir')->name("servis.calistir");
    Route::get( '/servis/{servi}/rezervasyonlar','ServisController@rezervasyonlar')->name("servis.rezervasyonlar");

    // list all_deleted servisler
    Route::get( '/servis/dlist',     'ServisController@all_deleted')->name("servis.all_deleted");
    Route::get('/servis/{servi}/delete',       'ServisController@delete')->name("servis.delete");

    Route::get( '/rezervasyon/simdiki','RezervasyonController@simdiki')->name("rezervasyon.simdiki");
    Route::get( '/rezervasyon/sonraki','RezervasyonController@sonraki')->name("rezervasyon.sonraki");
    Route::get( '/rezervasyon/gecmis', 'RezervasyonController@gecmis')->name("rezervasyon.gecmis");
    // Admin Resources
    Route::resource( '/rezervasyon','RezervasyonController');
    Route::resource( '/kort',       'KortController');
    Route::resource( '/kiralayan',  'KiralayanController');
    Route::resource( '/servis',     'ServisController');
    Route::resource( '/Acontacts',   'ContactsController');
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
    Route::resource( '/rezervasyon','RezervasyonController');

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
    Route::get('/',         'HomeController@index')->name('homepage'); // ana sayfa
    Route::get('/rezervasyonAl', 'HomeController@rezervasyonAl')->name('rezervasyonAl'); // randevo alma sayfa 
    Route::get('/contacts',      'ContactsController@create')->name('contacts'); // contact sayfa 
    Route::post('/contacts',      'ContactsController@store')->name('p_contacts'); // contact sayfa 
    Route::get('/prices',        'HomeController@prices')->name('prices'); // kiralama fiyatlari
    Route::get('/aboutUs',       'HomeController@aboutUs')->name('aboutUs'); // hakkimizde
    Route::get('/terms',         'HomeController@terms')->name('terms'); // Kurallar
  });
