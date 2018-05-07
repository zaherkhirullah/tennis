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
      Route::get('/kort/{kort}/delete','KortController@delete')->name("kort.delete");
      Route::post('/kort/{kort}/delete','KortController@p_delete')->name("kort.p_delete");
      Route::get('/kort/{kort}/restore','KortController@restore')->name("kort.restore");
      Route::post('/kort/{kort}/restore','KortController@p_restore')->name("kort.p_restore");
    Route::resource('/kort','KortController');
       

    /*****************
    * kiralayan Routes
    ******************/
    Route::get( '/kiralayan/dlist',  'KiralayanController@all_deleted')->name("kiralayan.all_deleted");
    Route::get( '/kiralayan/{kiralayan}/delete',  'KiralayanController@delete')->name("kiralayan.delete");    
    Route::resource( '/kiralayan',  'KiralayanController');  
   
    /*******************
     * Servis Routes
     ******************/
    Route::get( '/servis/{servi}/tamir',         'ServisController@tamir')->name("servis.tamir");
    Route::get( '/servis/{servi}/mesgul',        'ServisController@mesgul')->name("servis.mesgul");
    Route::get( '/servis/{servi}/calistir',      'ServisController@calistir')->name("servis.calistir");
    Route::get( '/servis/{servi}/rezervasyonlar','ServisController@rezervasyonlar')->name("servis.rezervasyonlar");
    Route::get('/servis/dlist',     'ServisController@all_deleted')->name("servis.all_deleted");
    Route::get('/servis/{servi}/delete', 'ServisController@delete')->name("servis.delete");
    Route::post('/servis/{servi}/delete', 'ServisController@p_delete')->name("servis.p_delete");
    Route::get('/servis/{servi}/restore', 'ServisController@restore')->name("servis.restore");
    Route::post('/servis/{servi}/restore', 'ServisController@p_restore')->name("servis.p_restore");
    Route::resource( '/servis',     'ServisController');
    
    /*****************
    * contacts Routes
    ******************/
    Route::get( '/contacts/{contacts}/delete',  'ContactsController@delete')->name("contacts.delete");    
    Route::get( '/contacts/dlist',  'ContactsController@all_deleted')->name("contacts.all_deleted");
    Route::resource( '/contacts',   'ContactsController');
  
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
    Route::get('/landing',[
        'uses' => 'RezervasyonController@landing',
        'as' => 'get.hours'
    ]);
    Route::post('/info/hours',[
        'uses' => 'RezervasyonController@get_empty_hours',
        'as' => 'ajax'
    ]);

    Route::get('/land',[
        'uses' => 'RezervasyonController@getview'
    ]);

      Route::get('/uzatma/{rezervasyon}',[
          'uses' => 'RezervasyonController@uzatma',
          'as' => 'rezervasyon.uzatma'
      ]);
      Route::get('/bekleme/{rezervasyon}',[
          'uses' => 'RezervasyonController@bekleme',
          'as' => 'rezervasyon.bekleme'
      ]);
    Route::resource( 'user/rezervasyon','RezervasyonController');

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




