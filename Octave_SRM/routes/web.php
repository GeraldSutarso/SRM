<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CRUD\CRUDController;

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

// Route::get('/', function () {
//     return view('home');
// });

//login routes
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Home routes
Route::get('home', [AuthController::class, 'home']); 
Route::get('/', [AuthController::class, 'home']); 

//Create routes
Route::get('add/{$asset_id}/step-1', [CRUDController::class, 'create_step1']);
Route::get('add/{$asset_id}/step-2', [CRUDController::class, 'create_step2']);
Route::get('add/{$asset_id}/step-3', [CRUDController::class, 'create_cstep3']);
Route::get('add/{$asset_id}/step-4', [CRUDController::class, 'create_cstep4']);
Route::get('add/{$asset_id}/step-5', [CRUDController::class, 'create_cstep5']);

//Update routes
Route::get('update/{$asset_id}', [CRUDController::class, 'update']);

//Delete routes
Route::get('delete/{$asset_id}', [CRUDController::class, 'delete']);

//Show routes