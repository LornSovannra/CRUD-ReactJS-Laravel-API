<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

//Public Routes
Route::get("/post", [PostController::class, "Home"]) -> name("home");
Route::get("/post/{id}", [PostController::class, "PersonalPost"]) -> name("personal-post");

Route::post("/upload", [PostController::class, "Upload"]) -> name("upload");
Route::put("/update/{id}", [PostController::class, 'Update']) -> name("update");

Route::delete("/delete/{id}", [PostController::class, "Delete"]) -> name("delete");

Route::post("/login", [AuthController::class, "Login"]);
Route::post("/register", [AuthController::class, "Register"]);

//Protected routes
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/user', [AuthController::class, "User"]);
    Route::post('/logout', [AuthController::class, 'Logout']);
});