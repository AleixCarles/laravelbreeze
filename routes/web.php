<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['autentificacio'])->group(function (){
    Route::get('/privada1',function (){
        echo'Privada1';
    });
    Route::get('/privada2',function (){
        echo'Privada2';
    });
});


/*Route::get('/privada1',function (){
    echo'Privada1';
})->middleware(['autentificacio']);

Route::get('/privada2',function (){
    if (!Auth::check()){
        return redirect(route('login'));
    }
    echo'Privada2';
});*/




require __DIR__.'/auth.php';
