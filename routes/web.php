<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElegantCollectionController;

Route::get('elegant-collections', [ElegantCollectionController::class, 'index']);
