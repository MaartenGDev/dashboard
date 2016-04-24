<?php
namespace App\Core;

use App\Http\Request;
use App\Http\Router;

class Kernel{

	public function __construct(Request $request){
		session_start();
		new Router($request);
	}

}