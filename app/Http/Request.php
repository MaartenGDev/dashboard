<?php
namespace App\Http;

class Request {

    private $request;
    public $errors = array('oi', 'oi2');
    protected $session;
    protected $requestData;

    public function __get($name) {
        if (!is_null($this->requestData[$name])) {
            return $this->requestData[$name];
        } else if (!is_null($this->session[$name])) {
            return $this->session[$name];
        } else {
            return $this->$name;
        }
    }

    public function get($key) {
        return $this->request->$key;
    }

    public function capture() {
        foreach ($_POST as $postKey => $postValue) {
            $this->requestData[$postKey] = $postValue;
        }
    }

    public function all() {
        return $this->requestData;
    }

    public function flash($type = null, $message = null) {
        $flash = array();
        if(is_null($type) || is_null($message)){
            if(isset($_SESSION['flash'])){
                $flash = $_SESSION['flash'];
                unset($_SESSION['flash']);
            }
            return $flash;
        }else{
            $messageBag = is_array($message) ? $message : array($message);
            $_SESSION['flash'][$type] = $messageBag;
        }
    }
}