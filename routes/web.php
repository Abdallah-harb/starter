<?php





    Route::get('/', function () {
        return view('welcome')->with(['name'=>'Abdallah','age'=>22]);
    });
Route::get('/user/info','NewsController@getuserInfo');
Route::get('copy',function(){
    return view('copy');
});
Route::get('test/lang',function(){
    return view('welcome');
});
/*
    Route::get('/test/{id}',function ($id){
       return view('test') . $id;
    });

    Route::get('/showstring/{id}',function ($id){
        return view('welcome') . $id;
    })->name('name');

    Route::namespace('Front')->group(function (){

        //Route::get('users','UserController@showAdminName');
    });


    Route::group(['prefix'=> 'users'],function(){
        Route::get('users','UserController@showAdminName');
    });

    Route::get('users','Controller@showAdminName');


*/
Route::resource('news','NewsController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
