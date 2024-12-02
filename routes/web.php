<?php

use App\Http\Controllers\FleetController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [FleetController::class, 'index']);


require __DIR__ . '/auth.php';
