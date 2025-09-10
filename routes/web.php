<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;

Route::get('/',[HomeController::class,'home']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/contact',[HomeController::class,'contact']);
Route::post("/welcome",[HomeController::class,"kirim"]);

Route::get('/master', function(){
    return view('layouts.master');
});

Route::middleware(['auth',IsAdmin::class])->group(function () {
    // Category
    // C => Create Data
    Route::get('/category/create',[CategoryController::class,'create']);
    Route::post('/category',[CategoryController::class,'store']);
    
    // U => Update Data
    Route::get('/category/{id}/edit',[CategoryController::class,'edit']);
    Route::put('/category/{id}',[CategoryController::class,'update']);
    
    // D => Delete Data
    Route::delete('/category/{id}',[CategoryController::class,'destroy']);

    
    
});

// middleware Auth
//Log out
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');
//Profile
Route::get('/profile',[AuthController::class,'getprofile'])->middleware('auth');
Route::post('/profile',[AuthController::class,'createprofile'])->middleware('auth');
Route::put('/profile/{id}',[AuthController::class,'updateprofile'])->middleware('auth');


// R => Read Data
Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/{id}',[CategoryController::class,'show']);


// CRUD Post
Route::resource('/post',PostController::class);

//Auth
//Register
Route::get ('/register', [AuthController::class, 'showregister']);
//untuk menampilkan form register
Route::post('/register',[AuthController::class,'registeruser']);

//Login
Route::get('/login',[AuthController::class,'showlogin'])->name('login');
Route::post('/login',[AuthController::class,'login']);
