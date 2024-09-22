<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentControllerResource;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NotificationControllerResource;
use App\Http\Controllers\TicketControllerResource;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// login routes
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-post',[LoginController::class,'login'])->name('auth.login');

// logout route
Route::get('/logout',[LogoutController::class,'logout_system'])->middleware('auth');

// tickets routes
Route::resources([
        'tickets' => TicketControllerResource::class,
        'notifications' => NotificationControllerResource::class,
        'comments' => CommentControllerResource::class,
    ]
);

// route to show ticket details and comments
Route::get('/tickets/{ticket}/details', [CommentControllerResource::class, 'showTicketComments'])->name('tickets.details');

// admin routes
Route::get('/users',[AdminController::class,'index'])->name('users.index');
Route::get('/delete/{user}',[AdminController::class,'destroy'])->name('user.destroy');
Route::get('/notifications/create/{user}',[NotificationControllerResource::class,'create'])->name('notifications.create.user');
Route::get('/users/{id}/export-pdf', [AdminController::class, 'exportSinglePdf'])->name('users.export.single');



