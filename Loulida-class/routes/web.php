<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\CoursFileController;
use App\Http\Controllers\CycleEducativeController;
use App\Http\Controllers\ExerciseFileController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\PartnerController;
use App\Models\ExerciseFile;
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
Route::get('/Teacher',[RegisteredUserController::class,'BecomePartnerOrTeacher'])->name('BecomePartnerOrTeacher');
// routes/web.php

Route::post('/become-teacher', [PartnerController::class,'submitTeacherForm'])->name('teacher.submit');
Route::get('/admin/partner-requests',[PartnerController::class,'showPartnerRequests'] )->name('admin.partner-requests');
Route::patch('/partner-Confirm/{id}', [PartnerController::class, 'Confirm'])->name('partnerRequests.Confirm');

Route::patch('/partner-UnConfirm/{id}', [PartnerController::class, 'UnConfirm'])->name('partnerRequests.UnConfirm');
Route::post('/add-Cours-file',  [CoursFileController::class, 'addFile'])->name('add-file');
Route::get('/cours/created',[CoursController::class,'index'])->name('cours.display');
Route::get('/cours',[CoursController::class,'create'])->name('cours.submit');
Route::post('/cours/store',[CoursController::class,'store'])->name('courses.store');


Route::delete('/cours-files/{coursFile}', [CoursFileController::class, 'destroy'])->name('cours-files.destroy');


Route::post('/exercise-files', [ExerciseFileController::class, 'store'])->name('exercise-files.store');
Route::delete('/exercise-files/{exerciseFile}', [ExerciseFileController::class, 'destroy'])->name('exercise-files.destroy');
Route::post('/exercise-files-with-correction', [ExerciseFileController::class, 'storeWithCorrection'])->name('exercise-files-with-correction.store');
Route::resource('courses', CoursController::class);


Route::get('/welcome', [FormationController::class, 'index'])->name('formation.index');
Route::get('/formations/create', [FormationController::class, 'create'])->name('formations.create');
Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');
// web.php

Route::get('/matieres/{cycleId}', [FormationController::class, 'getMatieresByCycle'])->name('matieres.by_cycle');

require __DIR__.'/auth.php';
