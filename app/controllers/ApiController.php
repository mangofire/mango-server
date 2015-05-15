<?php
class ApiController extends BaseController{

	function HelloG(){
		return Response::make("hello");
	}

	function HelloP(){
		$data = Input::get('Hello');
		return Response::make( 'you post a data '.$data.'to me ! Thank you !');
	}

	function ShowApi(){
		return View::make('api');
	}
}