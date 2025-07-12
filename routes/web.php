<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\IpController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\JsonExportController;


// Route::get('\create',[PostController::class,'create'])->name('create');

Route::resource('posts',PostController::class);

Route::get('/', function () {
    return view('create');
});

Route::get('/ip-info',[IpController::class,"show"]);

Route::get('/send-email',[EmailController::class,'create']);
Route::post('/send-email',[EmailController::class,'send'])->name('send.email');

Route::get('/export-ids',[JsonExportController::class,'exportID']);
