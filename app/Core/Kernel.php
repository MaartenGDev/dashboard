<?php
namespace App\Core;

use App\Http\Request;
use App\Http\Router;
use App\Services\Container;

class Kernel{

	public function __construct(){
		session_start();
		$request = Container::get(Request::class);
        $request->capture();
		new Router();
	}

}