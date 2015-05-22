<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/layout', function(){return View::make('easelayout');});
Route::get('/ease', function(){return View::make('testease');});
Route::any('/user/register', "UserController@register");
Route::any('/user/login', 'UserController@login');
Route::any('/user/logout', 'UserController@logout');
Route::get('/user/status', 'UserController@status');

Route::get('/user/upload/SMS', 'SMSController@uploadSMSPage');
Route::post('/user/upload/SMS', 'SMSController@uploadSMS');

Route::get('/user/upload/Contact', 'ContactController@uploadPage');
Route::post('/user/upload/Contact', 'ContactController@upload');


/*------------------test API-----------------------*/

Route::get('/api/test/parseSMSXML', 'SMSController@parseSMSXML');

Route::get('/api/SMS/trimcontact', 'SMSController@trimContact');
Route::get('/api/contact/parse', 'ContactController@parseVcf');
Route::get('/api/contact/trim', 'ContactController@trimContact');

Route::get('/api/record/insert', 'RecordController@insertPage');
Route::any('/api/record/put', 'RecordController@put');
Route::get('/api/record/trim', 'RecordController@trimType');

Route::get('/api/record/all', array('before' => 'token', 'uses' => 'RecordController@getall'));
Route::get('/api/contact/all', array('before' => 'token', 'uses' => 'ContactController@getall'));
Route::get('/api/SMS/all', array('before' => 'token', 'uses' => 'SMSController@getAll'));
Route::get('/api/token/get', array('before' => 'token', 'uses' => 'UserController@getToken'));
Route::post('/api/notification/store', array('before' => 'token', 'uses' => 'Notification@store'));
Route::get('/api/notification/read/0', array('before' => 'token', 'uses' =>'Notification@no_read'));//获得未读消息
Route::get('/api/notification/read/1', array('before' => 'token', 'uses' =>'Notification@all'));//获取所有消息
Route::post('/api/notification/read/set', array('before' => 'token', 'uses' =>'Notification@set_read'));
