<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChangePass;
use App\Models\Brand;

 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $brands=Brand::all();
    return view('home',compact('brands') );
});
Route::get('/home', function () {
    echo 'thisis home';
});
Route::get('/about', function () {
    
    return view('about');
});

Route::get('/contact', [ContactController::class, 'index'])->name('con');


Route::get('/category/all', [CategoryController::class, 'index'])
->name('all.category');
Route::post('/category/store', [CategoryController::class, 'store'])
->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);

Route::get('/softdelete/category/{id}', [CategoryController::class, 'softdelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'restore']);
Route::get('pdelete/category/{id}', [CategoryController::class, 'pDelete']);


// brand 
Route::get('/brand/all', [BrandController::class, 'index'])
->name('all.brand');
Route::post('/brand/store', [BrandController::class, 'store'])
->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'delete']);

// EMAIL VERIFICATION
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users=User::all();
    // $users=DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');

// logout
Route::get('/user/logout', [BrandController::class, 'logout'])->name('user.logout');

// admin 
Route::get('/home/slider', [HomeController::class, 'homeSlider'])
->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'addSlider'])
->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'storeSlider'])
->name('store.slider');

// password
Route::get('/user/password', [ChangePass::class, 'chPassword'])
->name('change.password');

Route::post('password/update', [ChangePass::class, 'updatePassword'])
->name('update.password');

