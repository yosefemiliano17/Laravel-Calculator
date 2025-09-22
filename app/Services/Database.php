<?php

namespace App\Services;

use App\Models\Operation;

class Database {

    public function __construct() {}

    public function findOperation(Operation $op) :? Operation {
        return Operation::where('operation', $op->getOperation())
                        ->where('value', $op->getValue())
                        ->first();
    } 

    public function saveOperation(Operation $op) : Operation {
        return Operation::create([
            'operation' => $op->getOperation(),
            'value' => $op->getValue(),
            'result' => $op->getResult()
        ]); 
    }

}