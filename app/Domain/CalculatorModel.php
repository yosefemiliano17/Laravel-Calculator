<?php

namespace App\Domain; 

use App\Models\Operation; 
use App\Services\Database;

class CalculatorModel {

    private Database $db; 

    public function __construct() {
        $this->db = new Database(); 
    }

    public function calculateOperation($operationType, $value) {
        
        $operation = $this->db->findOperation(new Operation([
            'operation' => $operationType,
            'value' => $value
        ]));

        if($operation) {
            return $operation; 
        }

        $result = 0; 
        
        if($operationType === 'factorial') {
            $result = $this->factorial($value);    
        }else if($operationType === 'fibonacci') {
            $result = $this->fibonacci($value); 
        }else {
            $result = $this->ackerman(1,$value); 
        }
        
        $operation = $this->db->saveOperation(new Operation([
            'operation' => $operationType,
            'value' => $value,
            'result' => $result
        ]));

        return $operation; 
    }

    private function fibonacci($value) {
        if($value <= 1) {
            return $value; 
        }
        return $this->fibonacci($value - 1) + $this->fibonacci($value - 2); 
    }

    private function factorial($value) {
        $result = 1; 
        for($i = 1; $i <= $value; $i++) {
            $result *= $i; 
        }
        return $result; 
    }

    private function ackerman($firstValue, $secondValue) {
        if($firstValue === 0) {
            return $secondValue + 1; 
        }else if($firstValue > 0 && $secondValue === 0) {
            return $this->ackerman($firstValue - 1, 1); 
        }else {
            return $this->ackerman($firstValue - 1, $this->ackerman($firstValue, $secondValue - 1)); 
        }
    }
}