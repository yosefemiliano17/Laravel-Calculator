<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\CalculatorModel; 

class ControllerOperation extends Controller
{
    private $calculatorModel; 

    public function __construct(CalculatorModel $calculatorModel) {
        $this->calculatorModel = $calculatorModel; 
    }

    public function index() {
        return view('welcome', ['operation' => null]); 
    }

    public function calculate(Request $request) {
        
        $operation = $this->calculatorModel->calculateOperation(
            $request->operation_type,
            (int)$request->value
        );

        return view('welcome', compact('operation'));
    }
}
