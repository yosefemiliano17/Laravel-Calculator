<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CalculatorService; 

class ControllerOperation extends Controller
{
    private $calculatorService; 

    public function __construct(CalculatorService $calculatorService) {
        $this->calculatorService = $calculatorService; 
    }

    public function index() {
        return view('welcome', ['operation' => null]); 
    }

    public function calculate(Request $request) {

        $request->validate([
            'operation_type' => 'required|in:factorial,fibonacci,ackerman',
            'value' => 'required|numeric|min:0|max:20'
        ]);
        
        $operation = $this->calculatorService->calculateOperation(
            $request->operation_type,
            (int)$request->value
        );

        return view('welcome', compact('operation'));
    }
}
