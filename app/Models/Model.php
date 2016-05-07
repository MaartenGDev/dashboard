<?php

namespace App\Models;


use App\Exceptions\StorageException;

class Model
{
    protected $aFields;

    public function __construct($aFields = null){
        if(!is_null($aFields)){
            if(array_keys($aFields) === $this->fillable){
                $this->aFields = $aFields;
            }else{
                throw new StorageException('Mass Assignment Attack Detected!');
            }
        }
    }

    private static function getTableName(){
        return strtolower(str_replace('App\\Models\\','',get_called_class())) . 's';
    }
    public static function find($id){
        $oQuery = new QueryBuilder();
        $currentClass = get_called_class();
        $currentModel = new $currentClass();

        $firstRecord = $oQuery->select()->from(self::getTableName() )->where(array('id' => $id))->result();
        if(count($firstRecord) > 0){
            foreach($firstRecord[0] as $key => $value){
                $currentModel->$key = $value;
            }
        }
        return $currentModel;
    }
    public function save(){
        $oQuery = new QueryBuilder();
        $oQuery->insert($this->aFields)->to($this->getTableName())->result();
    }
}