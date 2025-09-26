<?php

use App\Http\Controllers\Course_Student_Controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;


Route::apiResource('students', StudentController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('course_students', Course_Student_Controller::class);