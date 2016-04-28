<?php

namespace App\Models;


use App\Core\Config;
use App\Http\Request;

class Redirect
{
    const REDIRECT = 'redirect';
    const HTTP = 'http';

    protected $location;
    public function __construct($location)
    {
        $this->location = $location;
    }
    public function withInput(Request $request){

    return $request;
    }
    public function withErrors($request,$aValidatorErrors){
        $request->errors = $aValidatorErrors;
        return $request;
    }
    public function send(){
        header('Location: ' . Config::$sBaseUrl . $this->location);        
    }
}