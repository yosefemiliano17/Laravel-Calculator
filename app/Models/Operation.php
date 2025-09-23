<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use App\Domain\OperationModel;

class Operation extends Model {

    use HasFactory; 

    protected $table = 'operation'; 
    public $incrementing = false;

    protected $fillable = [
        'operation',
        'value',
        'result'
    ]; 

    public function __construct(OperationModel $op = null, array $attributes = []) {
        if ($op !== null) {
            $attributes = [
                'operation' => $op->getOperation(),
                'value'     => $op->getValue(),
                'result'    => $op->getResult(),
            ];
        }

        parent::__construct($attributes);
    }

    public function getOperation() {
        return $this->operation; 
    }

    public function getValue() {
        return $this->value; 
    }

    public function getResult() {
        return $this->result; 
    }

}
