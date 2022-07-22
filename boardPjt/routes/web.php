<?php
use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// 1차 주소 통합
Route::prefix('/boards')->group(function() {
    //            BoardController 클래스에서 불러올 메소드 명
    Route::get('/', [BoardController::class, 'index']);  // name(route에서 쓸 이름)
    Route::get('/create', [BoardController::class, 'create'])->name('boards.create'); 
    Route::post('/store', [BoardController::class, 'store'])->name('boards.store'); 
    Route::get('/show', [BoardController::class, 'show'])->name('boards.show');
    Route::get('/edit', [BoardController::class, 'edit'])->name('boards.edit'); 
    Route::post('/update', [BoardController::class, 'update'])->name('boards.update'); 
    Route::get('/destroy', [BoardController::class, 'destroy']);

});

Route::prefix('/users')->group(function() {
    Route::get('/', [UserController::class, "index"]);
    Route::get('/login', [UserController::class, "login"])->name('users.login');
    Route::get('/join', [UserController::class, "join"])->name('users.join');
    Route::post('/insUser', [UserController::class, "insUser"])->name('users.insUser');
});
