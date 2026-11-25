<?php
use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('agents.index');
});

Route::resource('agents', AgentController::class)->except(['show']);