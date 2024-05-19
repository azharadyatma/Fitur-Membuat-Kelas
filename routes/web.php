<?php

use App\Models\Kelasku;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;


Route::get('/', function () {
    return view('kelas',['title' => 'Kelas Saya', 'kelas'=> Kelasku::all()]);
});

Route::get('/kelas/{kelasku:slug}', function(Kelasku $kelasku){
    return view ('kelasku', ['title'=> 'Detail Kelas', 'kelasku' => $kelasku]);
});

Route::get('/absensi', function () {
    return view('absensi',['title' => 'Absensi']);
});

Route::get('/materi', function () {
    return view('materi',['title' => 'Materi']);
});

Route::get('/daftarMhs', function () {
    return view('daftarMhs',['title' => 'Daftar Mahasiswa']);
});

Route::get('/create', function() {
    return view('create', ['title' => 'Tambah Kelas']);
});

Route::post('/kelas', [KelasController::class, 'store']);