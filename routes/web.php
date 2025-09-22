<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerOperation; 

Route::get('/', [ControllerOperation::class, 'index']); 

Route::get('/calculator', function () {
    return redirect('/');
});

Route::post('/calculator', [ControllerOperation::class, 'calculate']); 