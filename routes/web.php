<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\InsidenController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RencanaController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\LaporanManagerController;





Route::resource('/auth', AuthController::class);
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.auth');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout.auth');

Route::resource('/administrator', AdministratorController::class)->except('show');
Route::resource('/administrator/proyek', ProyekController::class);
Route::get('/pengawas/proyek/{name}', [ProyekController::class, 'proyekPengawas']);
Route::get('/manager/proyek/{name}', [ProyekController::class, 'proyekManager']);
Route::put('/mulai/proyek/{proyek}', [ProyekController::class, 'updateIsStr']);
Route::get('/laporan/detail/{laporan}', [LaporanController::class, 'detailLaporan']);
Route::get('/laporan/solo/detail/{laporan}', [LaporanController::class, 'soloLaporan']);


Route::get('/manager/proyek', [ProyekController::class, 'Manager']);
Route::resource('/manager/laporan', LaporanManagerController::class);
Route::resource('/manager/insiden', InsidenController::class);


Route::get('/pengawas/proyek', [ProyekController::class, 'Pengawas']);
Route::resource('/pengawas/survei', SurveiController::class);
Route::resource('/user', UserController::class);


Route::resource('/proyek/detail', ProyekController::class);
Route::resource('/rencana', RencanaController::class);
Route::put('/rencana/full/update/{rencana}', [RencanaController::class, 'fullupdate']);
Route::resource('/laporan', LaporanController::class);
Route::resource('/insiden', InsidenController::class);
Route::resource('/survei', SurveiController::class);
Route::resource('/image', ImageController::class);





























Route::get('/', function () {
    return view('welcome', [
        "title" => "PROYEK",
        "link" => "/administrator/proyek/create",
        "subTitle" => null,
    ]);
})->middleware('auth');;

Route::get('/superadmin', function () {
    return view('welcome', [
        "title" => "Super Admin Template",
        "template" => "Super Admin Template"
    ]);
})->middleware('superadmin');
