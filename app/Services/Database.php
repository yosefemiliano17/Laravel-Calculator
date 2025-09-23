<?php

namespace App\Services;

use App\Domain\OperationModel; 
use App\Models\Operation;

class Database {

    public function __construct() {}

    public function findOperation(OperationModel $op) :? OperationModel {

        $operationEloquent = Operation::where('operation', $op->getOperation())
                                      ->where('value', $op->getValue())
                                      ->first();

        if(!$operationEloquent) {
            return null; 
        }

        return OperationModel::ConvertEloquentOperation($operationEloquent);
    } 

    public function saveOperation(OperationModel $op) : void {
        $operation = new Operation($op);
        $operation->save();
    }

}