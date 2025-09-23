<?php

namespace App\Domain; 

use App\Models\Operation;

class OperationModel {

    private string $operation; 
    private int $value; 
    private int $result; 

    public function __construct(string $operation, int $value) {
        $this->operation = $operation; 
        $this->value = $value; 
        $this->result = 0;
    }

    public static function convertEloquentOperation(Operation $op): OperationModel {
        $model = new OperationModel($op->getOperation(), $op->getValue());
        $model->setResult($op->getResult());
        return $model;
    }

    public function getOperation(): string {
        return $this->operation; 
    }

    public function getValue(): int {
        return $this->value; 
    }

    public function getResult(): int {
        return $this->result; 
    }

    public function setOperation(string $operation): void {
        $this->operation = $operation; 
    }

    public function setValue(int $value): void {
        $this->value = $value; 
    }

    public function setResult(int $result): void {
        $this->result = $result; 
    }

}