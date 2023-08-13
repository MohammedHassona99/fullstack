<?php

use App\Http\Controllers\CollectionController;
use Illuminate\Support\Facades\Route;

Route::get('collection', [CollectionController::class, 'collection']);
