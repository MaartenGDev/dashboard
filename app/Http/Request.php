<?php
namespace App\Http;

class Request{
	public static $request;

	public function Capture(){

		$request = new Request();
		$request->fullUrl ='oi/oi';
		$request->all = $_POST;
		self::$request = $request;
		return $request;
	}

}