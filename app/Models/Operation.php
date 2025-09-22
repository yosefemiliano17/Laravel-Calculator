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
}
