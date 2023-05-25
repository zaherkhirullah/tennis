<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::prefix('admin')->group(function () {
    Route::group(['namespace' => 'Admin'], function () {
        // Admin
        Route::get('/', 'AdminController@index')->name("admin");

        /*****************
         * reservation Routes
         ******************/
        Route::get('/reservation/list', 'ReservationController@index')->name("reservation.list");
//        Route::get('/reservation/{status}', 'ReservationController@status')->name("reservation.status");
        Route::get('/reservation/current', 'ReservationController@current')->name("reservation.current");
        Route::get('/reservation/nextReservations', 'ReservationController@nextReservations')->name("reservation.nextReservations");
        Route::get('/reservation/oldReservations', 'ReservationController@oldReservations')->name("reservation.oldReservations");
        Route::get('/reservation/deleted', 'ReservationController@allDeleted')->name("reservation.allDeleted");
        Route::get('/reservation/{reservation}/delete', 'ReservationController@delete')->name("reservation.delete");

        /******************
         * Kort Routes
         ******************/
        Route::get(
            '/stage/{stage}/fix', 'StageController@fix')
            ->name("stage.fix");
        Route::get(
            '/stage/{stage}/busy', 'StageController@busy')
            ->name("stage.busy");
        Route::get(
            '/stage/{stage}/run', 'StageController@run')
            ->name("stage.run");
        Route::get(
            '/stage/{stage}/reservations', 'StageController@reservations')
            ->name("stage.reservations");
        Route::get(
            '/stage/deleted', 'StageController@allDeleted')
            ->name("stage.allDeleted");
        Route::get('/stage/{stage}/delete', 'StageController@delete')->name("stage.delete");
        Route::post('/stage/{stage}/delete', 'StageController@p_delete')->name("stage.p_delete");
        Route::get('/stage/{stage}/restore', 'StageController@restore')->name("stage.restore");
        Route::post('/stage/{stage}/restore', 'StageController@p_restore')->name("stage.p_restore");
        Route::resource('/stage', 'StageController');


        /*****************
         * renter Routes
         ******************/
        Route::get('/renter/deleted', 'RenterController@allDeleted')->name("renter.allDeleted");
        Route::get('/renter/{renter}/delete', 'RenterController@delete')->name("renter.delete");
        Route::resource('/renter', 'RenterController');

        /*******************
         * Servis Routes
         ******************/
        Route::get('/service/{service}/fix', 'ServisController@fix')->name("service.fix");
        Route::get('/service/{service}/busy', 'ServisController@busy')->name("service.busy");
        Route::get('/service/{service}/run', 'ServisController@run')->name("service.run");
        Route::get('/service/{service}/reservations', 'ServisController@reservations')->name("service.reservations");
        Route::get('/service/deleted', 'ServisController@allDeleted')->name("service.allDeleted");
        Route::get('/service/{service}/delete', 'ServisController@delete')->name("service.delete");
        Route::post('/service/{service}/delete', 'ServisController@p_delete')->name("service.p_delete");
        Route::get('/service/{service}/restore', 'ServisController@restore')->name("service.restore");
        Route::post('/service/{service}/restore', 'ServisController@p_restore')->name("service.p_restore");
        Route::resource('/service', 'ServisController');

        /*****************
         * contacts Routes
         ******************/
        Route::get('/contacts/{contacts}/delete', 'ContactsController@delete')->name("contacts.delete");
        Route::get('/contacts/deleted', 'ContactsController@allDeleted')->name("contacts.allDeleted");
        Route::resource('/contacts', 'ContactsController');

    });
});

/*
|=============================
|      --/ User Area /--      
|=============================
*/

Route::group(['namespace' => 'User'], function () {
    Route::get('user/', 'UserController@index')->name("user");
    Route::get('user/profile', 'UserController@profile')->name("profile");
    Route::get('/landing', [
        'uses' => 'ReservationController@landing',
        'as'   => 'get.hours'
    ]);
    Route::post('/info/hours', [
        'uses' => 'ReservationController@getEmptyHours',
        'as'   => 'ajax'
    ]);

    Route::get('/land', [
        'uses' => 'ReservationController@getview'
    ]);

    Route::get('/extension/{reservation}', [
        'uses' => 'ReservationController@extension',
        'as'   => 'reservation.extension'
    ]);
    Route::get('/waiting/{reservation}', [
        'uses' => 'ReservationController@waiting',
        'as'   => 'reservation.waiting'
    ]);
    Route::resource('user/reservation', 'ReservationController');

});

/*
|=============================
|      --/ Home  Area /--      
|=============================
*/
Route::group(['namespace' => 'Home'], function () {
    Route::get('/home', 'HomeController@index')->name('home'); // ana sayfa
    Route::get('/', 'HomeController@index')->name('homepage'); // ana sayfa
    Route::get('/iletname', 'ContactsController@create')->name('contacts'); // contact sayfa
    Route::post('/iletname', 'ContactsController@store')->name('p_contacts'); // contact sayfa
    Route::get('/hakkimizda', 'HomeController@aboutUs')->name('aboutUs'); // hakkimizde
    Route::get('/prices', 'HomeController@prices')->name('prices'); // kiralama fiyatlari
    Route::get('/terms', 'HomeController@terms')->name('terms'); // Kurallar
});


Route::group(['namespace' => 'Settings'], function () {
    Route::get('lang/{lang}', 'LanguageController@index')->name('lang');
});

/*
|=============================
|      --/Account Area /--      
|=============================
*/
Route::prefix('account')->group(function () {
    Route::group(['namespace' => 'Account'], function () {
        Route::get('/profile', 'AccountController@showProfilePage')->name("profile");
        Route::post('/profile', 'AccountController@profile')->name("post_profile");
        Route::get('/change-password', 'AccountController@showchangePassword')->name('changePassword');;
        Route::post('/change-password', 'AccountController@changePassword')->name('post_changePassword');
    }
    );
}
);




