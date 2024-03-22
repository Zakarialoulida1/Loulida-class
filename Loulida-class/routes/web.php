<?php

use App\Http\Controllers\CycleEducativeController;
use App\Http\Controllers\MatiereController;
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



Route::get('/Cycles', [CycleEducativeController::class, 'index'])->name('cycles');
Route::post('/cycle', [CycleEducativeController::class, 'store'])->name('addcycle');
Route::delete('/Cycles/{id}', [CycleEducativeController::class, 'delete'])->name('delete.cycle');
Route::put('/cycle/update', [CycleEducativeController::class, 'update'])->name('update.cycle');
Route::get('/Matieres', [MatiereController::class, 'index'])->name('matieres');
Route::post('/matiere', [MatiereController::class, 'store'])->name('addmatiere');
Route::delete('/Matieres/{id}', [MatiereController::class, 'delete'])->name('delete.matiere');
Route::put('/matiere/update', [MatiereController::class, 'update'])->name('update.matiere');

require __DIR__.'/auth.php';
