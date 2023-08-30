<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilesController;

Route::get('/',function(){
    return view('welcome');
});
Route::get('/files/share/{hash_code}', [FilesController::class,'share'])
->name('files.share');
Route::get('/files/download/{hash_code}', [FilesController::class,'download'])
->name('files.download');
Route::post('/files/download', [FilesController::class,'downloadUrl'])
->name('files.downloadUrl');
Route::get('/files/downloadUrl', [FilesController::class,'downloadByUrl'])
->name('files.downloadByUrl');
Route::resource('/files', FilesController::class);

