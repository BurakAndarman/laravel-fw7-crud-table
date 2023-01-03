<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/', [StudentController::class,'listele']);
Route::get('/listele',[StudentController::class,'listele'])->name("ogrenci.listele");
Route::get('/ara/{column}/{sort}',[StudentController::class,'ara'])->name("ogrenci.ara");
Route::get('/yeni',[StudentController::class,'yeni'])->name("ogrenci.yeni");
Route::get('/duzenle',[StudentController::class,'düzenle'])->name("ogrenci.duzenle");
Route::get('/sil',[StudentController::class,'sil'])->name("ogrenci.sil");
Route::post('/guncelle/{sid}',[StudentController::class,'güncelle'])->name("ogrenci.guncelle");
Route::post('/olustur',[StudentController::class,'oluştur'])->name("ogrenci.olustur");