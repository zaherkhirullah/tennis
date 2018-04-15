<?php
header('Access-Control-Allow-Origin: *');
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

    /*****************
    * rezervasyon Routes
    ******************/
    Route::get( '/rezervasyon/list','RezervasyonController@index')->name("rezervasyon.list");
    Route::get( '/rezervasyon/simdiki','RezervasyonController@simdiki')->name("rezervasyon.simdiki");
    Route::get( '/rezervasyon/sonraki','RezervasyonController@sonraki')->name("rezervasyon.sonraki");
    Route::get( '/rezervasyon/gecmis', 'RezervasyonController@gecmis')->name("rezervasyon.gecmis");
    Route::get( '/rezervasyon/dlist','RezervasyonController@all_deleted')->name("rezervasyon.all_deleted");
    Route::get( '/rezervasyon/{rezervasyon}/delete','RezervasyonController@delete')->name("rezervasyon.delete");

    /******************
     * Kort Routes
     ******************/
    Route::resource('/kort','KortController');
    Route::get( 
      '/kort/{kort}/tamir','KortController@tamir')
      ->name("kort.tamir");
    Route::get( 
      '/kort/{kort}/mesgul','KortController@mesgul')
      ->name("kort.mesgul");
    Route::get( 
      '/kort/{kort}/calistir','KortController@calistir')
      ->name("kort.calistir");
    Route::get( 
      '/kort/{kort}/rezervasyonlar','KortController@rezervasyonlar')
      ->name("kort.rezervasyonlar");
    Route::get(
      '/kort/dlist','KortController@all_deleted')
      ->name("kort.all_deleted");
    Route::get(
       '/kort/{kort}/delete','KortController@delete')
       ->name("kort.delete");

    /*****************
    * kiralayan Routes
    ******************/
    Route::resource( '/kiralayan',  'KiralayanController');  
    Route::get( '/kiralayan/dlist',  'KiralayanController@all_deleted')->name("kiralayan.all_deleted");
    Route::get( '/kiralayan/{kiralayan}/delete',  'KiralayanController@delete')->name("kiralayan.delete");    
    /*******************
     * Servis Routes
     ******************/
    Route::resource( '/servis',     'ServisController');
    Route::get( '/servis/{servi}/tamir',         'ServisController@tamir')->name("servis.tamir");
    Route::get( '/servis/{servi}/mesgul',        'ServisController@mesgul')->name("servis.mesgul");
    Route::get( '/servis/{servi}/calistir',      'ServisController@calistir')->name("servis.calistir");
    Route::get( '/servis/{servi}/rezervasyonlar','ServisController@rezervasyonlar')->name("servis.rezervasyonlar");
    Route::get('/servis/dlist',     'ServisController@all_deleted')->name("servis.all_deleted");
    Route::get('/servis/{servi}/delete',       'ServisController@delete')->name("servis.delete");
    /*****************
    * contacts Routes
    ******************/
    Route::resource( '/contacts',   'ContactsController');
    Route::get( '/contacts/{contacts}/delete',  'ContactsController@delete')->name("contacts.delete");    
    Route::get( '/contacts/dlist',  'ContactsController@all_deleted')->name("contacts.all_deleted");
  });
});

/*
|=============================
|      --/ User Area /--      
|=============================
*/

  Route::group(['namespace' => 'User'], function()
  {
    Route::get( 'user/', 'UserController@index')->name("user");
    Route::get( 'user/hesabim', 'UserController@hesabim')->name("hesabim");
    Route::resource( 'user/rezervasyon','RezervasyonController');
    Route::get('/landing',[
        'uses' => 'RezervasyonController@landing',
        'as' => 'get.hours'
    ]);


    Route::post('/info/hours',[
        'uses' => 'RezervasyonController@get_empty_hours',
        'as' => 'ajax'
        //'middleware' => ['auth', 'permission:admin']
    ]);

    Route::get('/land',[
        'uses' => 'RezervasyonController@getview'
    ]);

    Route::post('/shit',[
        'uses' => 'RezervasyonController@shit',
        'as' => 'shit'
    ]);
  });

/*
|=============================
|      --/ Home  Area /--      
|=============================
*/
  Route::group(['namespace' => 'Home'], function()
  {
    Route::get('/home','HomeController@index')->name('home'); // ana sayfa
    Route::get('/',    'HomeController@index')->name('homepage'); // ana sayfa
    //Route::get('/rezervasyonAl', 'HomeController@rezervasyonAl')->name('rezervasyonAl'); // randevo alma sayfa
    Route::get('/iletisim',      'ContactsController@create')->name('contacts'); // contact sayfa 
    Route::post('/iletisim',      'ContactsController@store')->name('p_contacts'); // contact sayfa 
    Route::get('/hakkimizda',       'HomeController@aboutUs')->name('aboutUs'); // hakkimizde
    Route::get('/prices',        'HomeController@prices')->name('prices'); // kiralama fiyatlari    
    Route::get('/terms',         'HomeController@terms')->name('terms'); // Kurallar
  });




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




