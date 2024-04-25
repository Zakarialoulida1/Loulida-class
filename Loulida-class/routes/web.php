<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\CoursFileController;
use App\Http\Controllers\CycleEducativeController;
use App\Http\Controllers\ExerciseFileController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['role.etudiant']], function () {
   
Route::get('/Formation/cours', [FormationController::class, 'formation'])->name('Abbonement');

Route::get('/Teacher', [RegisteredUserController::class, 'BecomePartnerOrTeacher'])->name('BecomePartnerOrTeacher');
Route::post('/become-teacher', [PartnerController::class, 'submitTeacherForm'])->name('teacher.submit');


Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');


});

// Routes accessible to professors
Route::group(['middleware' => ['role.professeur']], function () {
   
Route::post('/add-Cours-file',  [CoursFileController::class, 'addFile'])->name('add-file');
Route::get('/cours/created', [CoursController::class, 'index'])->name('cours.display');
Route::get('/cours', [CoursController::class, 'create'])->name('cours.submit');
Route::post('/cours/store', [CoursController::class, 'store'])->name('courses.store');
Route::delete('/cours-files/{coursFile}', [CoursFileController::class, 'destroy'])->name('cours-files.destroy');


Route::post('/exercise-files', [ExerciseFileController::class, 'store'])->name('exercise-files.store');
Route::delete('/exercise-files/{exerciseFile}', [ExerciseFileController::class, 'destroy'])->name('exercise-files.destroy');
Route::post('/exercise-files-with-correction', [ExerciseFileController::class, 'storeWithCorrection'])->name('exercise-files-with-correction.store');
Route::resource('courses', CoursController::class);


});

// Routes accessible to admins
Route::group(['middleware' => ['role.admin']], function () {
    Route::patch('/payments/{id}/validate', [PaymentController::class, 'validatePayment'])->name('payments.validate');
    Route::patch('/payments/{id}/unvalidate', [PaymentController::class, 'unvalidatePayment'])->name('payments.unvalidate');

    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');

    
Route::patch('/partner-Confirm/{id}', [PartnerController::class, 'Confirm'])->name('partnerRequests.Confirm');
Route::patch('/partner-UnConfirm/{id}', [PartnerController::class, 'UnConfirm'])->name('partnerRequests.UnConfirm');
Route::get('/admin/partner-requests', [PartnerController::class, 'showPartnerRequests'])->name('admin.partner-requests');


Route::get('/Cycles', [CycleEducativeController::class, 'index'])->name('cycles');
Route::post('/cycle', [CycleEducativeController::class, 'store'])->name('addcycle');
Route::delete('/Cycles/{id}', [CycleEducativeController::class, 'delete'])->name('delete.cycle');
Route::put('/cycle/update', [CycleEducativeController::class, 'update'])->name('update.cycle');
Route::get('/Matieres', [MatiereController::class, 'index'])->name('matieres');
Route::post('/matiere', [MatiereController::class, 'store'])->name('addmatiere');
Route::delete('/Matieres/{id}', [MatiereController::class, 'delete'])->name('delete.matiere');
Route::put('/matiere/update', [MatiereController::class, 'update'])->name('update.matiere');



Route::get('/formations/create', [FormationController::class, 'create'])->name('formations.create');
Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');
Route::get('/formations/{id}/edit', [FormationController::class, 'edit'])->name('formations.edit');
Route::put('/formations/{id}', [FormationController::class, 'update'])->name('formations.update');
Route::delete('/formations/{id}/delete', [FormationController::class, 'destroy'])->name('formations.destroy');

});




Route::get('/', [FormationController::class, 'index'])->name('formation.index');
Route::get('/AllFormation', [FormationController::class, 'allformations'])->name('formation.all');
Route::get('/load-more-data', [FormationController::class, 'loadMoreData'])->name('load-more-data');
Route::get('/load-All-data', [FormationController::class, 'loadAllData'])->name('load-All-data');
Route::post('/filter-formations', [FormationController::class, 'filterFormations'])->name('filter-formations');
Route::get('/matieres/{cycleId}', [FormationController::class, 'getMatieresByCycle'])->name('matieres.by_cycle');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');


require __DIR__ . '/auth.php';
