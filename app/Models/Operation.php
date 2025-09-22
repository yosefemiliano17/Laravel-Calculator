<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Operation extends Model {

    use HasFactory; 

    protected $table = 'operation'; 
    public $incrementing = false;

    protected $fillable = [
        'operation',
        'value',
        'result'
    ]; 

    public function __construct(array $attributes = []) {
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
