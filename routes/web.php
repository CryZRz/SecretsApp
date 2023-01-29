<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get("/image/{name}", [App\Http\Controllers\ImageController::class, 'getImage'])->name("image.file");

Route::get("/image/profile/{name}", [App\Http\Controllers\ImageController::class, 'getProfileImage'])->name("image.profile");

Route::get("/profile/{id}", [App\Http\Controllers\UserController::class, "getUserProfile"])->name("profile");

Route::post("/save/secret", [App\Http\Controllers\SecretController::class, "saveSecret"])->name("save.secret");

Route::post("update/profile", [App\Http\Controllers\UserController::class, "updateInfoUser"])->name("update.profile");
