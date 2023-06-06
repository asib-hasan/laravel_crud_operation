<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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
Route::get('admin',[StudentController::class,'index']);
Route::get('add-student',[StudentController::class,'addStudent']);
Route::get('add-teacher',[TeacherController::class,'addTeacher']);
Route::post('save-teacher',[TeacherController::class,'saveTeacher']);
Route::get('filter-student',[StudentController::class,'filterStudent']);
Route::get('filter-teacher',[TeacherController::class,'filterTeacher']);
Route::post('save-student',[StudentController::class,'saveStudent']);
Route::get('login',[StudentController::class,'login']);
Route::get('student-page/{id}',[StudentController::class,'studentPage']);
Route::get('edit-student/{id}',[StudentController::class,'EditStudent']);
Route::post('update-student',[StudentController::class,'updateStudent']);
Route::get('delete-student/{id}',[StudentController::class,'deleteStudent']);
Route::get('delete-teacher/{id}',[TeacherController::class,'deleteTeacher']);