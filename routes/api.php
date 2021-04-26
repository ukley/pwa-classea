<?php

use Illuminate\Http\Request;

Route::post('fazer-login','Auth\LoginController@login')->name('login');

Route::get('boletim','PerfilController@boletim')->name('boletim');




/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

