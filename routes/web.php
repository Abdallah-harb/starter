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
































Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
