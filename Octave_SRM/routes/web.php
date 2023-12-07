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
Route::get('home', [AuthController::class, 'home'])->name('home'); 
Route::get('/', [AuthController::class, 'home']); 

//Create(get) routes
Route::get('add/step-1', [CRUDController::class, 'step1'])->name('step1');
Route::get('add/step-2', [CRUDController::class, 'step2'])->name('step2');
Route::get('add/step-3', [CRUDController::class, 'step3'])->name('step3');
Route::get('add/step-4', [CRUDController::class, 'step4'])->name('step4');
Route::get('add/step-5', [CRUDController::class, 'step5'])->name('step5');

//Create(post) routes
Route::post('post-add/step-1', [CRUDController::class, 'create_step1'])->name('step1.post');
Route::post('post-add/step-2', [CRUDController::class, 'create_step2'])->name('step2.post');
Route::post('post-add/step-3', [CRUDController::class, 'create_step3'])->name('step3.post');
Route::post('post-add/step-4', [CRUDController::class, 'create_step4'])->name('step4.post');
Route::post('post-add/step-5', [CRUDController::class, 'create_step5'])->name('step5.post');

//for step3 button
Route::get('add/step-3/add-technical', [CRUDController::class, 'add_technical'])->name('add.technical');
Route::get('add/step-3/add-physical', [CRUDController::class, 'add_physical'])->name('add.physical');
Route::get('add/step-3/add-human', [CRUDController::class, 'add_human'])->name('add.human');


//Update routes
Route::get('update/{$asset_id}', [CRUDController::class, 'update'])->name('update');
Route::post('post-upd', [AuthController::class, 'postUpd'])->name('update.post'); 

//Delete routes
Route::post('delete/{$asset_id}', [CRUDController::class, 'delete'])->name('delete');

//Show routes
Route::get('show/{$asset_id}', [CRUDController::class, 'show'])->name('show');
Route::post('generatePdf/{$asset_id}', [CRUDController::class, 'genPDF'])->name('genPDF');

//Fallback
Route::fallback(function () {
    return redirect('/');
});