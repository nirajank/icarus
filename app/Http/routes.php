<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('index1');
});
Route::get('/dashboard', function () {
    return redirect('menu');
});
Route::resource('index1','indexcontroller');
Route::resource('menu','menucontroller');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
// Password reset routes...
Route::resource('career','CareerController');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::resource('contact','contactcontroller');
Route::any('tablefinder','newmenucontroller@tablefinder');
Route::any('tabledetailfinder','newmenucontroller@tabledetailfinder');
Route::get('test',function(){
	return view('enquirytest');
});
Route::any('menuedit/{i}/{table}','newmenucontroller@menuedit');
Route::any('menuupdate/{ii}/{tablee}','newmenucontroller@menuupdate');
Route::any('menudelete/{iii}/{tableee}','newmenucontroller@menudestroy');
//Route::resource('slider','slidercontroller');
Route::resource('enquiry','EnquiryController');
Route::post('enquiry/send','EnquiryController@send');
Route::get('/email','EnquiryController@email');
Route::post('/download/{id}','EnquiryController@download');
Route::any('reply/{id}','EnquiryController@reply');
//Route::resource('about','aboutcontroller');
//Route::resource('product','productcontroller');
//Route::resource('productdetail','productdetailcontroller');
Route::get('newproductdetail/create/{id}','newmenucontroller@newproductdetailcreate');
Route::any('newproductdetailstore','newmenucontroller@newproductdetailstore');
Route::any('newproductdetailedit/{id}/{table}/{maintable}','newmenucontroller@newproductdetailedit');
Route::any('newproductdetailupdate/{id}/{table}/{maint}','newmenucontroller@newproductdetailupdate');
Route::any('newproductdetaildestroy/{id}/{table}/{maint}','newmenucontroller@newproductdetaildestroy');
//Route::resource('service','servicecontroller');
Route::resource('/{id}','newmenucontroller');
