<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ScholarsController;
use App\Http\Controllers\ScholarshipDeductionController;



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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function(){
    return view('admin.dashboard');
});

Route::get('/scholarship', [App\Http\Controllers\ScholarshipController::class, 'scholarships'])->name('scholarships');
// Route::get('scholarships/scholarship-create', 'App\Http\Controllers\ScholarshipController@create');
// Route::get('/scholarhip-edit/{id}','App\Http\Controllers\ScholarshipController@scholarshipedit');
// Route::put('/scholarship-update/{id}','App\Http\Controllers\ScholarshipController@scholarshipupdate');
// Route::delete('/scholarship-delete/{id}','App\Http\Controllers\ScholarshipController@scholarshipdelete');
// Route::post('/scholarship','App\Http\Controllers\ScholarshipController@store');
// Route::get('/scholars','App\Http\Controllers\ScholarshipController@join');
// Route::get('/scholarlist','App\Http\Controllers\ScholarshipController@show');

// Route::get('/filter','App\Http\Controllers\ScholarshipController@filtered');

Route::resource('/scholarship', 'App\Http\Controllers\ScholarshipController');
Route::resource('/scholars', 'App\Http\Controllers\ScholarsController');
Route::resource('/scholarshipdeduction', 'App\Http\Controllers\ScholarshipDeductionController');
Route::get('scholarship_detail/export_mapping', 'App\Http\Controllers\ScholarshipController@export_mapping')->name('scholarship_detail.export_mapping') ;