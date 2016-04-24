<?php

namespace App\Models;


use App\Exceptions\StorageException;

class Model
{
    protected $aFields;

    public function __construct($aFields){
        if(array_keys($aFields) === $this->fillable){
            $this->aFields = $aFields;
        }else{
            throw new StorageException('Mass Assignment Attack Detected!');
        }

    }
    public function save(){
        $oQuery = new QueryBuilder();
        $oQuery->insert($this->aFields)->to(strtolower(str_replace('App\\Models\\','',get_class($this))) . 's')->result();
    }
}