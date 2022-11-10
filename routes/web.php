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

//Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Auth::routes(['verify' => true]);


//facebook
Route::get('/redirect/{service}','SocialiteController@redirect');

// after login with facebook callback to my site
Route::get('/callback/{service}'.'SocialiteController@callback');
/*
Route::get('/', function () {
    return view('welcome');
});

*/
Route::get('showview','Front\UserController@getIndex');

Route::get('/test1', function () {
    return "welcome";
});

Route::get('/test2/{id}', function ($id) {
    return $id;
})->name('a');

Route::get('/test3/{id?}',function ($id){

    return $id;
});
/*
//allRoute for front end
Route::nameSpace('Front')->group(function (){

        Route::get('users','UserController@showUserName');

});
// route prefix , group , middleware

Route::prefix('users')->group (function(){

    Route::get('show','UserController@showUser');

});
*/
Route::group(['prefix'=> 'users'],function(){

    Route::get('/',function (){

        return 'Works';
    });
});

Route::get('test','Admin\SecondController@showData');

Route::group(['namespace' => 'Admin'],function (){

    Route::get('second','SecondController@showString0')->middleware('auth');
    Route::get('second1','SecondController@showString1');
    Route::get('second2','SecondController@showString2');
    Route::get('second3','SecondController@showString3');

});
/*
Route::get('login',function (){

    return "must be login to show this page";
})->name('login');

Route::resource('news','NewsController');

Route::get('','Front\UserController@showdata');

*/

Route::get('fillable','CrudController@getOffers');



//Start route prefix for lang translate [en | ar ] for mcamara package
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    //Route::get('insert','CrudController@store');

    //route for translate site as [offers/ar|en/create]
    Route::group(['prefix' => 'offers'],function (){

        Route::get('create','CrudController@create');

        Route::post('store','CrudController@store')->name('offer.store');

        Route::get('edit/{offer_id}','CrudController@edit');

        Route::post('update/{offer_id}','CrudController@update')->name('offer.update');

        Route::get('delete/{offer_id}','CrudController@delete')->name('offer.delete');

        Route::get('all-offers','CrudController@show');

    });

    //route for event and listener

        Route::group(['namespace' => 'Youtub'],function (){

            Route::get('show-viewer','viewerController@viewer')->middleware('auth');
        });

});
//End route prefix for lang translate [en | ar ] for mcamara package

###########################################################
###########################################################
################### Using Ajax ############################
###########################################################
###########################################################

Route::group(['prefix' => 'ajax-offer'],function (){

    Route::get('create','OfferController@create');

    Route::post('store','@store')->name('ajax.store');

    Route::post('delete','OfferController@delete')->name('ajax_delete');

    Route::get('all-offers','OfferController@showall');


});
############## Begin Authenticate && Guard ########
Route::group(['namespace'=>'Auth','middleware' => 'CheckAge'],function (){

    Route::get('adults','CustomAuth@adults')->name('adults');
});
Route::group(['namespace'=>'Auth'],function (){

    Route::get('site','CustomAuth@site')->middleware('auth:web')->name('site');
    Route::get('admin','CustomAuth@admin')->middleware('auth:admin')->name('admin');
    Route::get('admin/login','CustomAuth@adminLogin')->name('admin.login');
    Route::post('admin/checklogin','CustomAuth@checkAdminlogin')->name('admin_check');

});

############## End Authenticate && Guard ##########

############# start relations ####################
Route::group(['namespace'=> 'Relations'],function (){
                ################## one - to - one ############
    Route::get('has-one','relationController@hasOnerelation');
    Route::get('has-one-reverse','relationController@hasOneReverserelation');
    Route::get('user-has-phone','relationController@userHasPhone');
    Route::get('user-not-has-phone','relationController@userNotHasPhone');
                ############### one - to - many ##############
    Route::get('hospital-has-many','relationController@getHospitalDoctor');
    Route::get('doctors-has-one-hospital','relationController@doctorsgethospital');
    Route::get('hospitals','relationController@hospitals');
    Route::get('doctors/{hospital_id}','relationController@doctors')->name('hospital.doctors');
    Route::get('hospital-delete/{hospital_delete}','relationController@hospitaldelete')->name('hospital.delete');

});




############# End relations   ####################


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

