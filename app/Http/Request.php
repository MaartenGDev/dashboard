<?php
namespace App\Http;

class Request{

	public function all(){
		return $_POST;
	}

}