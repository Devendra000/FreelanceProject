<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\giverController;
use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',function(){
    return redirect(route('loginGiver'));
});

// Route::get('/homepage',[authController::class,'homepage'])->name('homepage');

// Route::get('/login',[authController::class,'login'])->name('login');
// Route::post('/login',[authController::class,'loginPost'])->name('login.post');

// Route::get('/registration', [authController::class,'registration'])->name('registration');
// Route::post('/registration', [authController::class,'registrationPost'])->name('registration.post');


Route::get('/loginGiver',[authController::class,'loginGiver'])->name('loginGiver');
Route::get('/loginReceiver',[authController::class,'loginReceiver'])->name('loginReceiver');

Route::post('/loginGiver',[authController::class,'loginGiverPost'])->name('loginGiver.post');
Route::post('/loginReceiver',[authController::class,'loginReceiverPost'])->name('loginReceiver.post');

Route::get('/registerReceiver',[authController::class,'registerReceiver'])->name('registerReceiver');
Route::get('/registerGiver',[authController::class,'registerGiver'])->name('registerGiver');

Route::post('/registerReceiver',[authController::class,'registerReceiverPost'])->name('registerReceiver.post');
Route::post('/registerGiver',[authController::class,'registerGiverPost'])->name('registerGiver.post');


Route::get('/homepageGiver',[authController::class,'homepageGiver'])->name('homepageGiver');
Route::get('/homepageReceiver',[authController::class,'homepageReceiver'])->name('homepageReceiver');

Route::get('/profileGiver',[authController::class,'profileGiver'])->name('profileGiver');
Route::get('/profileReceiver',[authController::class,'profileReceiver'])->name('profileReceiver');

Route::post('/uploadGiver',[giverController::class,'uploadGiver'])->name('uploadGiver');

//Redirects without giving error message using middleware 'auth', multiple routes can be grouped together to get through "auth" middleware where user login is checked, if user is valid, only then the routes inside this function are accessed, else redirected to the '/' route

// Route::group(["middleware"=>"auth"],function(){
    
//     Route::get('/profile',[authController::class,' profile'])->name('profile');

// });

Route::get('/admin',[adminController::class, 'adminEdit'])->name('adminEdit');

Route::get('/showGivers', [authController::class,'showGivers'])->name('showGivers');
Route::get('/showReceivers', [authController::class,'showReceivers'])->name('showReceivers');
Route::get('/admin/showAll',[adminController::class, 'adminEdit'])->name('showAll');
Route::get('/admin/showGivers',[adminController::class, 'showGiversAdmin'])->name('showGiversAdmin');
Route::get('/admin/showReceivers',[adminController::class, 'showReceiversAdmin'])->name('showReceiversAdmin');

Route::get('/logoutGiver', [authController::class,'logoutGiver'])->name('logoutGiver');

Route::get('/logoutReceiver', [authController::class,'logoutReceiver'])->name('logoutReceiver');

Route::post('/upload',[giverController::class, 'uploadGiver'])->name('uploadGiver');

Route::get('/popup', function(){
    return view('popup');
});

Route::post('/updateGiver',[giverController::class, 'updateGiver'])->name('updateGiver');

Route::get('/addGiver',[adminController::class, 'addGiver'])->name('addGivers');
Route::get('/addReceiver',[adminController::class, 'addReceiver'])->name('addReceivers');

Route::get('/admin/search',[adminController::class, 'search'])->name('searchByAdmin');
Route::get('/admin/viewTrash/search',[adminController::class, 'trashSearch'])->name('trashSearchByAdmin');

Route::get('/admin/trashGiver/{id}',[adminController::class, 'trashGiver'])->name('trashGiver');
Route::get('/admin/trashReceiver/{id}',[adminController::class, 'trashReceiver'])->name('trashReceiver');

Route::get('/admin/viewTrash',[adminController::class, 'viewTrash'])->name('viewTrash');

Route::get('/restoreGiver/{id}',[adminController::class, 'restoreGiver'])->name('restoreGiver');
Route::get('/restoreReceiver/{id}',[adminController::class, 'restoreReceiver'])->name('restoreReceiver');

Route::get('/deleteGiver/{id}',[adminController::class, 'deleteGiverForce'])->name('deleteGiver');
Route::get('/deleteReceiver/{id}',[adminController::class, 'deleteReceiverForce'])->name('deleteReceiver');

