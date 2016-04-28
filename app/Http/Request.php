<?php
namespace App\Http;

class Request
{
    private $request;
    protected $errors = array('oi','oi2');
    public function get($key){
        return $this->request->$key;
    }
}