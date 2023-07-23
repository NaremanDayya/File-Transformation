<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilesController;

Route::get('/files/share/{id}', [FilesController::class,'share'])
->name('files.share');
Route::resource('/files', FilesController::class);


Route::get('/files/download/{id}', [FilesController::class,'download'])
->name('files.download');


