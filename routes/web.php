<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', [HomeController::class, 'showLatestCars_testimonials']);

 Route::get('/dashboard', function () {
    return view('dashboard');
 })->middleware(['auth', 'verified'])->name('dashboard');;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

// index routes

Route::get('/home_page',[HomeController::class, 'showLatestCars_testimonials']);
Route::get('/listing',[ListingController::class, 'listing']);
Route::get('/testimonials',[TestimonialController::class, 'testimonial']);
Route::get('/blog',[BlogController::class, 'blog']);
Route::get('/about',[AboutController::class, 'about']);
Route::get('/contact',[ContactController::class, 'contact']);
Route::post('/contact/submit',[ContactController::class, 'submit']);
Route::get('/single/{id}',[CarController::class, 'show']);

//admin_login
Route::get('admin_login/{type}', [AuthenticatedSessionController::class, 'create'])
                ->middleware('CheckAdmin');
         


//admin routes
//usercontroller
Route::middleware(['web','unreadmessages'])->group(function(){
Route::prefix('/admin_users')->group(function() {
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/all', [UserController::class, 'index'])->name('all');
    Route::get('/edit/{id}', [UserController::class, 'edit']);
    Route::put('/update/{id}', [UserController::class, 'update']);
    
});
    //categorycontroller

    Route::prefix('/admin_categories')->group(function() {
        Route::get('/create', [CategoryController::class, 'create']);
        Route::post('/store', [CategoryController::class, 'store']);
        Route::get('/all', [CategoryController::class, 'index']);
        Route::get('/edit/{id}', [CategoryController::class, 'edit']);
        Route::put('/update/{id}', [CategoryController::class, 'update']);
        Route::get('/delete/{id}', [CategoryController::class, 'destroy']);
    });

    //testimonialcontroller
    Route::prefix('/admin_testimonials')->group(function() {
        Route::get('/create', [TestimonialController::class, 'create']);
        Route::post('/store', [TestimonialController::class, 'store']);
        Route::get('/all', [TestimonialController::class, 'index']);
        Route::get('/edit/{id}', [TestimonialController::class, 'edit']);
        Route::put('/update/{id}', [TestimonialController::class, 'update']);
        Route::get('/delete/{id}', [TestimonialController::class, 'destroy']);
    });
    //Carcontroller
    Route::prefix('/admin_cars')->group(function() {
        Route::get('/create', [CarController::class, 'create']);
        Route::post('/store', [CarController::class, 'store']);
        Route::get('/all', [CarController::class, 'index']);
        Route::get('/edit/{id}', [CarController::class, 'edit']);
        Route::put('/update/{id}', [CarController::class, 'update']);
        Route::get('/delete/{id}', [CarController::class, 'destroy']);
    });
    //contactcontroller
    Route::prefix('/admin_messages')->group(function() {
        Route::get('/all',[ContactController::class, 'index']);
        Route::get('/show/{id}',[ContactController::class, 'show']);
        Route::get('/delete/{id}', [ContactController::class, 'destroy']);
    

           });
        });



    





