<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CRUD\CRController;
use App\Http\Controllers\CRUD\DController;
use App\Http\Controllers\CRUD\UController;
use App\Http\Controllers\PDF\GenController;
use App\Http\Controllers\Home\HomeController;

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

//middleware check if user authenticated
Route::middleware(['auth.check'])->group(function () {
//routes that require user to be authenticated

//Home routes
Route::get('home', [HomeController::class, 'home'])->name('home'); 
Route::get('/', [HomeController::class, 'home']); 

//the search bar
Route::get('/search', [HomeController::class, 'search'])->name('search');


//Create(get) routes
Route::get('add/step-1', [CRController::class, 'step1'])->name('step1');
Route::get('add/step-2', [CRController::class, 'step2'])->name('step2');
Route::get('add/step-3', [CRController::class, 'step3'])->name('step3');
Route::get('add/step-4', [CRController::class, 'step4'])->name('step4');
Route::get('add/step-5', [CRController::class, 'step5'])->name('step5');

//Create(post) routes
Route::post('post-add/step-1', [CRController::class, 'create_step1'])->name('step1.post');
Route::post('post-add/step-2', [CRController::class, 'create_step2'])->name('step2.post');
Route::post('post-add/step-3', [CRController::class, 'create_step3'])->name('step3.post');
Route::post('post-add/step-4', [CRController::class, 'create_step4'])->name('step4.post');
Route::post('post-add/step-5', [CRController::class, 'create_step5'])->name('step5.post');

//for step3 button
Route::get('add/step-3/add-technical', [CRController::class, 'add_technical'])->name('add.technical');
Route::get('add/step-3/add-physical', [CRController::class, 'add_physical'])->name('add.physical');
Route::get('add/step-3/add-human', [CRController::class, 'add_human'])->name('add.human');


//Update routes
Route::get('update/{$asset_id}', [UController::class, 'update'])->name('update');
Route::post('post-upd', [AuthController::class, 'postUpd'])->name('update.post'); 

//Delete routes
Route::post('delete/{$asset_id}', [DController::class, 'delete'])->name('delete');

//Show routes
Route::get('show/{$asset_id}', [GenController::class, 'show'])->name('show');
Route::post('generatePdf/{$asset_id}', [GenController::class, 'genPDF'])->name('genPDF');


//Fallback
Route::fallback(function () {
    return redirect('/');
});
});